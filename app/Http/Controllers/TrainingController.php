<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $trainings = Training::all();

        return view('site.training.index', compact('trainings'));
    }

    public function create()
    {
        return view('site.training.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'school' => 'required',
            'description' => 'min:4',
            'start' => 'required',
            'end' => 'required',
        ]);
        $profile = Curriculum::firstOrFail();
        $project = new Training($request->all());
        $project->Curriculum()->associate($profile);
        $project->save();

        return redirect()->route('training.index')
                         ->with('success', 'Training Created successfully.');
    }

    public function edit(Training $training)
    {
        return view('site.training.edit', compact('training'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'school' => 'required',
            'description' => 'min:4',
            'start' => 'required',
            'end' => 'required',
        ]);
        $profile = Curriculum::firstOrFail();
        $project = Training::find($id);
        $project->name = $request->name;
        $project->school = $request->school;
        $project->description = $request->description;
        $project->start = $request->start;
        $project->end = $request->end;

        $project->Curriculum()->associate($profile);
        $project->save();

        return redirect()->route('training.index')
                         ->with('success', 'Training Updated successfully.');
    }

    public function destroy(Training $training)
    {
        $training->delete();

        return redirect()->route('training.index')
                         ->with('success', 'Training Deleted successfully.');
    }
}

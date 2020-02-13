<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $experiences = Experience::all();

        return view('site.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('site.experience.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'job' => 'required|min:3',
            'description' => 'min:5',
            'start' => 'required',
            'end' => 'required',
        ]);
        $profile = Curriculum::firstOrFail();
        $experience = new Experience($request->all());
        $experience->Curriculum()->associate($profile);
        $experience->save();

        return redirect()->route('experience.index')
                        ->with('success', 'Skills Created successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('experience.index')
                        ->with('success', 'Experience Deleted successfully.');
    }
}

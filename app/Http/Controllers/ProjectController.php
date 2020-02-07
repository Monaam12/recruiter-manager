<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('site.project.index', compact('projects'));
    }

    public function create()
    {
        return view('site.project.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'min:3',
            'start' => 'required',
            'end' => 'required',
        ]);
        $profile = Curriculum::firstOrFail();
        $project = new Project($request->all());
        $project->Curriculum()->associate($profile);
        $project->save();

        return redirect()->route('project.index')->with('success', 'Project Created successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('project.index')
                        ->with('success', 'Project Deleted successfully.');
    }
}

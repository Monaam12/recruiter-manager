<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skills::all();

        return view('site.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('site.skills.index');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        $profile = Curriculum::firstOrFail();
        $skill = new Skills();
        $skill->name = $request->name;
        $skill->Curriculum()->associate($profile);
        $skill->save();

        return redirect()->route('skills.index')
                        ->with('success', 'Skills Created successfully.');
    }

    public function destroy(Skills $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index')
                        ->with('success', 'Skills Deleted successfully.');
    }
}

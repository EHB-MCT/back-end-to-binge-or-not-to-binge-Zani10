<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('videos.index', compact('projects'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'steps' => 'required',
        ]);

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'steps' => $request->steps,
        ]);

        return redirect()->route('videos.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('videos.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('videos.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'steps' => 'required',
        ]);

        $project->update($request->all());

        return redirect()->route('videos.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('videos.index')->with('success', 'Project deleted successfully.');
    }
}


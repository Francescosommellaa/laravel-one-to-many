<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::paginate(17);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'programming_language' => 'required|string',
            'img' => 'nullable|string',
            'thumbnail_img' => 'nullable|string',
            'website_url' => 'required|string|url',
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        Project::create($validatedData);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'programming_language' => 'required|string',
            'img' => 'nullable|string',
            'thumbnail_img' => 'nullable|string',
            'website_url' => 'required|string|url',
        ]);

        $validatedData['slug'] = Str::slug($request->name);
        $project->update($validatedData);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\Project\ProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at')->get();
        return view('pages.Project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        
        return view('pages.Project.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = array_merge($request->validated(), [
            'owner_id' => Auth::user()->id,
        ]);
        
        Project::create($data);

        return redirect()->route('projects.index', ['access' => 'yes']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('pages.Project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        Gate::authorize('edit', $project);
        
        $users = User::all();

        return view('pages.Project.edit', ['project' => $project, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        Gate::authorize('update', $project);

        $project->update($request->validated());

        return redirect()->route('projects.show', ['project' => $project->id, 'access' => 'yes']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Gate::authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index', ['access' => 'yes']);
    }
}

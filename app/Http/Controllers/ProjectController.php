<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projects;

    public function __construct(){
        $this->projects = collect([
            [
                'id' => 1,
                'title' => 'Тестовый проект 1', 
                'onwer_id' => 1, 
                'is_active' => true, 
                'created_at' => '2026-01-28 10:57:13', 
                'assignee_id' => 1, 
                'deadline_date' => '2026-01-30'
            ],
            [
                'id' => 2,
                'title' => 'Тестовый проект 2', 
                'onwer_id' => 1, 
                'is_active' => false, 
                'created_at' => '2026-01-28 11:30:46', 
                'assignee_id' => 1, 
                'deadline_date' => '2026-02-02'
            ],
        ]);
    }
        
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.Project.index', ['projects' => $this->projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('projects.index', ['access' => 'yes']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = $this->projects->firstWhere('id', $id);

        if (empty($project))
            abort(404);
        
        return view('pages.Project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = $this->projects->firstWhere('id', $id);

        if (empty($project))
            abort(404);
        
        return view('pages.Project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('projects.show', ['project' => $id, 'access' => 'yes']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Удаление проекта {$id}";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Список проектов';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Создать новый проект';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Сохранение проекта';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Страница проекта: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Редактирование проекта {$id}";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Сохранение редактирования проекта {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Удаление проекта {$id}";
    }
}

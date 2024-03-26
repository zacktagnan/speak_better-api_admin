<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Http\Request;
use Inertia\Response;

class LessonController extends Controller
{
    const ITEMS_PER_PAGE = 25;

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return inertia('Lessons/Index', [
            'lessons' => Lesson::paginate(self::ITEMS_PER_PAGE),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia('Lessons/Create', [
            'categories' => Category::all(),
            'levels' => Level::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

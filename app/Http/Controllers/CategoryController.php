<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class CategoryController extends Controller
{
    const ITEMS_PER_PAGE = 25;

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // return Inertia::render('Categories.Index', [
        //     'categories' => Category::paginate(25),
        //     'categoriesTotal' => Category::all()->count(),
        // ]);
        // ----------------------------------------------------------
        // ¿Por qué con Inertia::render no funciona?
        // ----------------------------------------------------------
        // Si la cantidad de registros es pequeña como para ver la BARRA de PAGINADO:
        //     -> crear más registros
        //     -> y/o reducir el valor de la cantidad de la constante
        return inertia('Categories/Index', [
            'categories' => Category::paginate(self::ITEMS_PER_PAGE),
            'categoriesTotal' => Category::all()->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->all());
        return redirect()->route('categories.index');
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
    public function edit(Category $category): Response
    {
        return inertia('Categories/Edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}

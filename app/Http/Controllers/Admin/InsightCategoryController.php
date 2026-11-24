<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsightCategory;
use Illuminate\Http\Request;

class InsightCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = InsightCategory::all();
        return view('admin.insight-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insight-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        InsightCategory::create($request->only('title'));

        return redirect()->route('admin.insight-categories.index')->with('success', 'Category created successfully.');
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
        $category = InsightCategory::findOrFail($id);
        return view('admin.insight-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category = InsightCategory::findOrFail($id);
        $category->update($request->only('title'));

        return redirect()->route('admin.insight-categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = InsightCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.insight-categories.index')->with('success', 'Category deleted successfully.');
    }
}

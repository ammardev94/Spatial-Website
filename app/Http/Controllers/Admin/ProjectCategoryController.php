<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProjectCategory::latest()->paginate(10);
        return view('admin.project-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:project_categories,title',
        ]);

        try {
            ProjectCategory::create($request->only('title'));
            Session::flash('msg.success', 'Project Category created successfully.');
            return redirect()->route('admin.project-categories.index');
        } catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
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
    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.project-categories.edit', compact('projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:project_categories,title,' . $projectCategory->id,
        ]);

        try {
            $projectCategory->update($request->only('title'));
            Session::flash('msg.success', 'Project Category updated successfully.');
            return redirect()->route('admin.project-categories.index');
        } catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        try {
            $projectCategory->delete();
            Session::flash('msg.success', 'Project Category deleted successfully.');
            return redirect()->route('admin.project-categories.index');
        } catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}

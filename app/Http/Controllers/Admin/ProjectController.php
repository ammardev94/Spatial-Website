<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(ProjectFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['title']);

            $project = Project::create($validated);

            $this->handleImages($request, $project);

            Session::flash('msg.success', 'Project created successfully.');
            return redirect()->route('admin.projects.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        $project->load(['feature_img', 'main_img', 'gallery']);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(ProjectFormRequest $request, Project $project)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['title']);

            $project->update($validated);

            $this->handleImages($request, $project);

            Session::flash('msg.success', 'Project updated successfully.');
            return redirect()->route('admin.projects.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $images = $project->morphMany(Image::class , 'imageable')->get();
            foreach ($images as $image) {
                Storage::disk('public')->delete($image->url);
                $image->delete();
            }

            $project->delete();

            Session::flash('msg.success', 'Project deleted successfully.');
            return redirect()->route('admin.projects.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Helper to handle image uploads for polymorphic relationships.
     */
    private function handleImages($request, $project)
    {
        if ($request->hasFile('feature_img')) {
            if ($project->feature_img) {
                Storage::disk('public')->delete($project->feature_img->url);
                $project->feature_img->delete();
            }
            $path = $request->file('feature_img')->store('projects/feature-images', 'public');
            $project->feature_img()->create(['url' => $path, 'tag' => 'feature_img']);
        }

        if ($request->hasFile('main_img')) {
            if ($project->main_img) {
                Storage::disk('public')->delete($project->main_img->url);
                $project->main_img->delete();
            }
            $path = $request->file('main_img')->store('projects/main-images', 'public');
            $project->main_img()->create(['url' => $path, 'tag' => 'main_img']);
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('projects/gallery', 'public');
                $project->gallery()->create(['url' => $path, 'tag' => 'gallery']);
            }
        }

    }

    /**
     * Remove the specified image from storage.
     */
    public function deleteImage(Image $image)
    {
        try {
            Storage::disk('public')->delete($image->url);
            $image->delete();

            return response()->json([
                'status' => true,
                'message' => 'Image deleted successfully.'
            ]);
        }
        catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
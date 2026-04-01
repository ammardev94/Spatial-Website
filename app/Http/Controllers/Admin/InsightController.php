<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Image;
use App\Models\Insight;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\InsightFormRequest;

class InsightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insights = Insight::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.insights.index', compact('insights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insights.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsightFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['title']);

            $insight = Insight::create($validated);

            $this->handleImages($request, $insight);

            Session::flash('msg.success', 'Insight created successfully.');
            return redirect()->route('admin.insights.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insight $insight)
    {
        return view('admin.insights.edit', compact('insight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InsightFormRequest $request, Insight $insight)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['title']);

            $insight->update($validated);

            $this->handleImages($request, $insight);

            Session::flash('msg.success', 'Insight updated successfully.');
            return redirect()->route('admin.insights.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insight $insight)
    {
        try {
            $images = $insight->morphMany(Image::class , 'imageable')->get();
            foreach ($images as $image) {
                Storage::disk('public')->delete($image->url);
                $image->delete();
            }

            $insight->delete();

            Session::flash('msg.success', 'Insight deleted successfully.');
            return redirect()->route('admin.insights.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * AJAX: Delete individual image from gallery
     */
    public function deleteImage(Image $image)
    {
        try {
            Storage::disk('public')->delete($image->url);
            $image->delete();
            return response()->json(['status' => true]);
        }
        catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Handle Image Uploads (Polymorphic)
     */
    private function handleImages($request, $insight)
    {
        if ($request->hasFile('feature_img')) {
            if ($insight->featureImage) {
                Storage::disk('public')->delete($insight->featureImage->url);
                $insight->featureImage->delete();
            }
            $path = $request->file('feature_img')->store('insights/feature', 'public');
            $insight->featureImage()->create(['url' => $path, 'tag' => 'feature']);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('insights/gallery', 'public');
                $insight->images()->create(['url' => $path, 'tag' => 'gallery']);
            }
        }
    }
}
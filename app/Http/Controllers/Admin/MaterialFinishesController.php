<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\MaterialNFinish;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\MaterialFinishesFormRequest;

class MaterialFinishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materialFinishes = MaterialNFinish::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.material_finishes.index', compact('materialFinishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.material_finishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialFinishesFormRequest $request)
    {
        try {
            $validated = $request->validated();
            $materialFinish = MaterialNFinish::create($validated);

            if ($request->hasFile('feature_img')) {
                $path = $request->file('feature_img')->store('material_finishes', 'public');
                $materialFinish->feature_img()->create(['url' => $path, 'tag' => 'feature']);
            }

            Session::flash('msg.success', 'Material & Finish created successfully.');
            return redirect()->route('admin.material_finishes.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialNFinish $materialFinish)
    {
        return view('admin.material_finishes.edit', compact('materialFinish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialFinishesFormRequest $request, MaterialNFinish $materialFinish)
    {
        try {
            $validated = $request->validated();
            $materialFinish->update($validated);

            if ($request->hasFile('feature_img')) {
                if ($materialFinish->feature_img) {
                    Storage::disk('public')->delete($materialFinish->feature_img->url);
                    $materialFinish->feature_img->delete();
                }
                $path = $request->file('feature_img')->store('material_finishes', 'public');
                $materialFinish->feature_img()->create(['url' => $path, 'tag' => 'feature']);
            }

            Session::flash('msg.success', 'Material & Finish updated successfully.');
            return redirect()->route('admin.material_finishes.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialNFinish $materialFinish)
    {
        try {
            if ($materialFinish->feature_img) {
                Storage::disk('public')->delete($materialFinish->feature_img->url);
                $materialFinish->feature_img->delete();
            }

            $materialFinish->delete();

            Session::flash('msg.success', 'Material & Finish deleted successfully.');
            return redirect()->route('admin.material_finishes.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
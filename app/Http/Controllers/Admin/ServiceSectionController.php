<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\ServiceSectionItem;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class ServiceSectionController extends Controller
{
    public function getItems(ServiceSection $section)
    {
        return response()->json([
            'success' => true,
            'items' => $section->items()->with('image')->get()
        ]);
    }

    /**
     * Store a newly created section.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:text,list,grid,video',
        ]);

        try {
            $section = ServiceSection::create($request->all());
            return response()->json(['success' => true, 'section' => $section]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified section.
     */
    public function update(Request $request, ServiceSection $section)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:text,list,grid,video',
        ]);

        try {
            $section->update($request->all());
            return response()->json(['success' => true]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified section.
     */
    public function destroy(ServiceSection $section)
    {
        try {
            // Cleanup items images
            foreach ($section->items as $item) {
                if ($item->image) {
                    Storage::disk('public')->delete($item->image->url);
                    $item->image->delete();
                }
            }
            $section->delete();
            return response()->json(['success' => true]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a new item for a section.
     */
    public function storeItem(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:service_sections,id',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'video_url' => 'nullable|string|max:500',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:500',
        ]);

        try {
            $data = $request->except('image');
            $data['open_in_new_tab'] = $request->has('open_in_new_tab');
            $item = ServiceSectionItem::create($data);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('services/sections', 'public');
                $item->image()->create(['url' => $path, 'tag' => 'item']);
            }

            return response()->json(['success' => true, 'item' => $item->load('image')]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Delete an item.
     */
    public function deleteItem(ServiceSectionItem $item)
    {
        try {
            if ($item->image) {
                Storage::disk('public')->delete($item->image->url);
                $item->image->delete();
            }
            $item->delete();
            return response()->json(['success' => true]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
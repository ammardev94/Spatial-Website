<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class MediaController extends Controller
{
    /**
     * Display a listing of all media files.
     */
    public function index()
    {
        $images = Image::with('imageable')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.media.index', compact('images'));
    }

    /**
     * Remove the specified media from storage.
     */
    public function destroy($id)
    {
        try {
            $image = Image::findOrFail($id);

            // Delete from storage
            if (Storage::disk('public')->exists($image->url)) {
                Storage::disk('public')->delete($image->url);
            }

            $image->delete();

            Session::flash('msg.success', 'Media file deleted successfully.');
            return redirect()->back();
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
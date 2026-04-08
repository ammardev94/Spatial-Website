<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoiController extends Controller
{
    /**
     * Display a listing of the ROI requests.
     */
    public function index()
    {
        $rois = RoiRequest::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.roi.index', compact('rois'));
    }

    /**
     * Display the specified ROI request.
     */
    public function show(RoiRequest $roi)
    {
        return view('admin.roi.show', compact('roi'));
    }

    /**
     * Remove the specified ROI request from storage.
     */
    public function destroy(RoiRequest $roi)
    {
        try {
            $roi->delete();
            Session::flash('msg.success', 'ROI request deleted successfully.');
            return redirect()->route('admin.roi.index');
        }
        catch (\Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
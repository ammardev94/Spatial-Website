<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSubService;
use App\Models\ServiceSubServiceItem;
use Illuminate\Http\Request;
use Exception;

class ServiceSubServiceController extends Controller
{
    /**
     * Store a new sub-service group.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
        ]);

        try {
            $subService = ServiceSubService::create($request->all());
            return response()->json(['success' => true, 'sub_service' => $subService]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified sub-service group.
     */
    public function destroy(ServiceSubService $subService)
    {
        try {
            $subService->delete();
            return response()->json(['success' => true]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a new item for a sub-service group.
     */
    public function storeItem(Request $request)
    {
        $request->validate([
            'sub_service_id' => 'required|exists:service_sub_services,id',
            'title' => 'required|string|max:255',
        ]);

        try {
            $item = ServiceSubServiceItem::create($request->all());
            return response()->json(['success' => true, 'item' => $item]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Delete an item.
     */
    public function destroyItem(ServiceSubServiceItem $item)
    {
        try {
            $item->delete();
            return response()->json(['success' => true]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
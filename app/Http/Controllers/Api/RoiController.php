<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoiRequest;
use App\Http\Requests\RoiStoreRequest;
use Illuminate\Http\Request;
use Exception;

class RoiController extends Controller
{
    /**
     * Store a new ROI request.
     */
    public function store(RoiStoreRequest $request)
    {
        try {
            $roi = RoiRequest::create($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Your ROI request has been submitted successfully!',
                'data' => $roi
            ], 201);
        }
        catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your request.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
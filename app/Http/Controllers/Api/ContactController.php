<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Store a new contact request.
     */
    public function store(ContactRequest $request)
    {
        try {
            $contact = Contact::create($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Your request has been submitted successfully!',
                'data' => $contact
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
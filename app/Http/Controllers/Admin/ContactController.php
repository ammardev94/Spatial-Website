<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the contact requests.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified contact request.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified contact request from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            Session::flash('msg.success', 'Contact request deleted successfully.');
            return redirect()->route('admin.contacts.index');
        }
        catch (\Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralInformation;
use App\Http\Requests\GeneralInformationRequest;
use Illuminate\Support\Facades\Session;
use Exception;

class GeneralInformationController extends Controller
{
    /**
     * Show the form for editing the general information.
     */
    public function edit()
    {
        $info = GeneralInformation::first() ?? new GeneralInformation();
        return view('admin.settings.general', compact('info'));
    }

    /**
     * Update the general information.
     */
    public function update(GeneralInformationRequest $request)
    {
        try {
            $validated = $request->validated();

            // Single record update or create
            GeneralInformation::updateOrCreate(
            ['id' => 1], // Always keep only one record with id 1
                $validated
            );

            Session::flash('msg.success', 'General information updated successfully.');
            return redirect()->route('admin.settings.general.edit');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
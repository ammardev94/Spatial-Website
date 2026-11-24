<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralInformation;
use App\Http\Requests\GeneralInformationRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
            $existingInfo = GeneralInformation::first() ?? new GeneralInformation();

            // Handle header logo upload
            if ($request->hasFile('header_logo')) {
                // Delete old logo if exists
                if ($existingInfo->header_logo && Storage::disk('public')->exists($existingInfo->header_logo)) {
                    Storage::disk('public')->delete($existingInfo->header_logo);
                }
                $validated['header_logo'] = $request->file('header_logo')->store('settings/logos', 'public');
            }

            // Handle footer logo upload
            if ($request->hasFile('footer_logo')) {
                // Delete old logo if exists
                if ($existingInfo->footer_logo && Storage::disk('public')->exists($existingInfo->footer_logo)) {
                    Storage::disk('public')->delete($existingInfo->footer_logo);
                }
                $validated['footer_logo'] = $request->file('footer_logo')->store('settings/logos', 'public');
            }

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
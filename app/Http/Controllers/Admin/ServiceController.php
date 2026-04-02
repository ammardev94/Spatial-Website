<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Image;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Exception;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(ServiceRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['title']);
            $validated['open_in_new_tab'] = $request->has('open_in_new_tab');

            $service = Service::create($validated);

            if ($request->hasFile('hero_image')) {
                $path = $request->file('hero_image')->store('services/hero', 'public');
                $service->heroImage()->create(['url' => $path, 'tag' => 'hero']);
            }

            Session::flash('msg.success', 'Service created successfully.');
            return redirect()->route('admin.services.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        $service->load(['sections.items', 'subServices.items']);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        try {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['title']);
            $validated['open_in_new_tab'] = $request->has('open_in_new_tab');

            $service->update($validated);

            if ($request->hasFile('hero_image')) {
                if ($service->heroImage) {
                    Storage::disk('public')->delete($service->heroImage->url);
                    $service->heroImage->delete();
                }
                $path = $request->file('hero_image')->store('services/hero', 'public');
                $service->heroImage()->create(['url' => $path, 'tag' => 'hero']);
            }

            Session::flash('msg.success', 'Service updated successfully.');
            return redirect()->route('admin.services.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        try {
            // Polymorphic image cleanup
            if ($service->heroImage) {
                Storage::disk('public')->delete($service->heroImage->url);
                $service->heroImage->delete();
            }

            // Cleanup section items images if they exist via relationships (not done here yet as standard)
            // But we'll handle main service deletion
            $service->delete();

            Session::flash('msg.success', 'Service deleted successfully.');
            return redirect()->route('admin.services.index');
        }
        catch (Exception $e) {
            Session::flash('msg.error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
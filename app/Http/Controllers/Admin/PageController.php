<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\PageFile;
use App\Models\PageMeta;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PageFormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Handle request.
     *
     * @return \Illuminate\Http\View
     */
    public function index(Request $request): View
    {
        Log::info($request->method().' '.$request->url());

        $pages = Page::with('user')->paginate(10);

        return view('admin.cms.page.index', ['pages' => $pages]);
    }

    /**
     * Handle request.
     *
     * @return \Illuminate\Http\View
     */
    public function create(Request $request): View
    {
        Log::info($request->method().' '.$request->url());

        return view('admin.cms.page.create');
    }

    /**
     * Handle request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\View
     */
    public function store(PageFormRequest $request): RedirectResponse
    {
        try {

            $validated = $request->validated();

            $validated['added_by'] = auth()->guard('admin')->user()->id;
            $validated['created_at'] = Carbon::now();

            Page::create($validated);

            Session::Flash('msg.success', 'Page saved successfully.');

            return redirect()->route('cms.page.index');
        } catch (Exception $e) {

            Session::Flash('msg.error', $e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id): View
    {
        $page = Page::findOrFail($id);

        return view('admin.cms.page.edit', ['page' => $page]);
    }

    /**
     * Update the specified Page in storage.
     *
     * @param  int  $id
     * @param  UpdatePackagesRequest  $request
     */
    public function update($id, PageFormRequest $request): RedirectResponse
    {
        try {

            $validated = $request->validated();

            $validated['updated_at'] = Carbon::now();

            Page::whereId($id)->update($validated);

            Session::Flash('msg.success', 'Page updated successfully.');

            return redirect()->route('cms.page.index');
        } catch (Exception $e) {

            Session::Flash('msg.error', $e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param  int  $id
     */
    public function destroy($id): RedirectResponse
    {
        $page = Page::findOrFail($id);
        $page->delete();

        Session::Flash('msg.success', 'Page deleted successfully.');

        return redirect()->route('cms.page.index');
    }

    /**
     * Edit page meta.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function pageMetas($id): View
    {
        $page = Page::whereId($id)
            ->with(['pageMetas', 'pageFiles'])
            ->first();

        return view('admin.cms.page-meta', ['page' => $page]);
    }

    /**
     * Edit page meta.
     *
     * @param  int  $id
     */
    public function pageMetasUpdate($id, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {

            $page = Page::findOrFail($id);
            if (! $page) {
                Session::Flash('msg.error', 'Page not found');
            }

            $baseDirectory = 'page-images/'.$page->id;

            $filteredInputs = collect($request->except(['_token', '_method']))
                ->filter(function ($value, $key) use ($request) {
                    return ! $request->hasFile($key);
                });

            $metaData = [];
            if ($filteredInputs->count() > 0) {
                $metaData = $filteredInputs->mapWithKeys(function ($value, $key) {
                    return [$key => $value];
                })->toArray();
            }

            foreach ($metaData as $key => $value) {
                PageMeta::updateOrCreate(
                    [
                        'ref_id' => $page->id,
                        'ref_key' => $key,
                    ],
                    [
                        'ref_value' => $value,
                    ]
                );
            }

            $fileInputs = $request->allFiles();

            $fileData = [];
            foreach ($fileInputs as $key => $file) {

                $data = [];

                $filePath = $file->store($baseDirectory, 'public');
                $data['path'] = $filePath;

                $fileName = basename($filePath);
                $data['name'] = $fileName;

                $data['ref_point'] = $key;

                $fileData[] = $data;
            }

            foreach ($fileData as $data) {
                PageFile::updateOrCreate(
                    [
                        'ref_id' => $page->id,
                        'ref_point' => $data['ref_point'],
                    ],
                    $data
                );
            }

            DB::commit();

            $currentImages = PageFile::where('ref_id', $page->id)
                ->get()
                ->pluck('path')
                ->toArray();

            $allFiles = Storage::disk('public')->allFiles($baseDirectory);

            $imagesToBeDelete = collect($allFiles)->filter(function ($image) use ($currentImages) {
                if (! in_array($image, $currentImages)) {
                    return $image;
                }
            });

            foreach ($imagesToBeDelete as $file) {
                Storage::disk('public')->delete($file);
            }

            Session::Flash('msg.success', 'Page Meta updated successfully');

            return redirect()->route('cms.page.index');
        } catch (Exception $e) {

            DB::rollback();
            Session::Flash('msg.error', $e->getMessage());

            return redirect()->back();
        }
    }
}

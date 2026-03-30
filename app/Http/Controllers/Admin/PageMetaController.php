<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\PageMeta;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PageMetaFormRequest;

class PageMetaController extends Controller
{
    /**
     * Handle request.
     *
     * @return \Illuminate\Http\View
     */
    public function index(Request $request): View
    {
        Log::info($request->method().' '.$request->url());
        $metas = PageMeta::with('page')->paginate(5);

        return view('admin.cms.page_meta.index', ['metas' => $metas]);
    }

    /**
     * Handle request.
     *
     * @return \Illuminate\Http\View
     */
    public function create(Request $request): View
    {
        Log::info($request->method().' '.$request->url());

        $pages = Page::all();

        return view('admin.cms.page_meta.create', ['pages' => $pages]);
    }

    /**
     * Handle request.
     *
     * @param  \Illuminate\Http\PageMetaFormRequest  $request
     */
    public function store(PageMetaFormRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            $validated['created_at'] = Carbon::now();

            PageMeta::create($validated);

            Session::Flash('msg.success', 'Page Meta saved successfully.');

            return redirect()->route('cms.page_meta.index');
        } catch (Exception $e) {

            Session::Flash('msg.error', $e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified Page Meta.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id): View
    {
        $pages = Page::all();
        $pageMeta = PageMeta::findOrFail($id);

        return view('admin.cms.page_meta.edit', ['pages' => $pages, 'pageMeta' => $pageMeta]);
    }

    /**
     * Handle request.
     *
     * @param  \Illuminate\Http\PageMetaFormRequest  $request
     */
    public function update($id, PageMetaFormRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            $validated['updated_at'] = Carbon::now();

            PageMeta::whereId($id)->update($validated);

            Session::Flash('msg.success', 'Page Meta updated successfully.');

            return redirect()->route('cms.page_meta.index');
        } catch (Exception $e) {

            Session::Flash('msg.error', $e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Remove the specified Page Meta from storage.
     *
     * @param  int  $id
     */
    public function destroy($id): RedirectResponse
    {
        $pageMeta = PageMeta::findOrFail($id);
        $pageMeta->delete();

        Session::Flash('msg.success', 'Page Meta deleted successfully.');

        return redirect()->route('cms.page_meta.index');
    }
}

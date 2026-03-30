<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(): View
    {
        return view('admin.notification');
    }

    public function markAllAsRead(): RedirectResponse
    {
        auth()->guard('admin')->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function deleteAll(): RedirectResponse
    {
        auth()->guard('admin')->user()->notifications()->delete();
        return redirect()->back();
    }

    public function delete(string $id): RedirectResponse
    {
        $notification = auth()->guard('admin')->user()->notifications()->find($id);
        if ($notification) {
            $notification->forceDelete();
        }

        return redirect()->back();
    }
}

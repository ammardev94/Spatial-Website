<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::guard('admin')->user();

            if ($request->hasFile('img')) {
                $request->validate([
                    'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                if ($user->image) {
                    Storage::disk('public')->delete($user->image->url);
                    $user->image->delete();
                }

                $file = $request->file('img');
                $filePath = $file->store('user-images', 'public');

                $user->image()->create([
                    'url' => $filePath,
                ]);

                Session::flash('msg.success', 'Profile image updated successfully.');
                return redirect()->route('admin.profile.index');
            }

            if ($request->has('name')) {
                $request->validate([
                    'name' => 'required|string|max:45',
                    // 'email' => 'required|email|unique:users,email,' . $user->id,
                ]);

                User::whereId($user->id)->update([
                    'name' => $request->name,
                    // 'email' => $request->email,
                ]);

                Session::flash('msg.success', 'Personal information updated successfully.');
                return redirect()->route('admin.profile.index');
            }

            return redirect()->back();

        }
        catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('msg.error', $e->getMessage());
            return redirect()->back();
        }
    }
}
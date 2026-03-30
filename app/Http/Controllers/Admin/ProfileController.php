<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Profile;
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
            $payload = $request->except("_token", '_method', 'img');


            if ($request->hasFile('img')) {

                if (!is_null($user->img)) {
                    Storage::disk('public')->delete($user->img);
                }


                $filename = $request->file('img')->store('users', 'public');
                $payload["img"] = $filename;
            }

            User::whereId($user->id)->update($payload);

            $user->refresh();
            
            Session::flash('msg.success', 'Profile updated successfully.');
            return redirect()->route('admin.profile.index');
        } catch (Exception $e) {

            Log::error($e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}

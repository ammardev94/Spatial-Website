<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Notifications\AdminResetPassword;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route("admin.dashboard");
        }

        Log::info($request->method().' '.$request->url());

        return view('admin.auth.index');
    }

    public function login_attempt(LoginRequest $request): RedirectResponse
    {
        try {

            $credentials = $request->only('email', 'password');
            $remember = $request->input('remember_me') ?? false;

            if (Auth::guard('admin')->attempt($credentials, $remember)) {

                if (! empty($request->input('ref'))) {
                    return redirect($request->input('ref'));
                }

                return redirect()->route('admin.dashboard');
            }

            Session::flash('msg.error', 'Invalid credentials');

            return redirect()->back();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('msg.error', $e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Handle logout for the admin guard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * Display the forgot password view.
     */
    public function forgot_password(): View
    {
        return view('admin.auth.forgot');
    }

    /**
     * Handle the forgot password request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgot_password_attempt(Request $request)
    {
        $validator = Validator::make($request->except('_token'), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $validated = $request->except('_token');

        try {
            $user = User::where('email', $validated['email'])->first();
            $token = Password::getRepository()->create($user);
            $user->notify(new AdminResetPassword($token, $user));

            Session::flash('msg.success', 'Password reset link has been sent to your email.');

            return redirect()->back();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('msg.error', $e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Display the reset password form.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function reset_password($token)
    {
        return view('admin.auth.reset', ['token' => $token]);
    }

    /**
     * Handle the reset password request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset_password_attempt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            Session::flash('msg.success', 'Password has been reset successfully.');

            return redirect()->route('admin.login');
        }

        Session::flash('msg.error', 'Failed to reset password.');

        return redirect()->back();
    }

}

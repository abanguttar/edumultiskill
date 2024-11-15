<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminAttemptRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{



    public function dashboard()
    {
        $title = "Dashboard";
        return view('admin/dashboard', compact('title'));
    }
    public function adminLoginIndex()
    {
        $title = "Login";
        return view('admin/login', compact('title'));
    }


    public function adminAttemptLogin(AdminAttemptRequest $request)
    {
        $credentials = $request->validated();

        /**
         * Check is credentials valid?
         * if not valid redirect back to previous page
         */
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages(['username' => 'Username dan Password salah!']);
            return back()->onlyInput('username');
        }

        /**
         * If success regenerate session
         */

        $request->session()->regenerate();
        Log::notice('Admin Login .............', [
            'username' => Auth::user()->username,
            'nama' => Auth::user()->nama,
        ]);

        $this->flashSuccessLogin($request);
        return redirect()->intended('/admin/dashboard');
    }



    public function adminAttemptLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $this->flashSuccessLogout($request);

        return redirect()->route('login')->withHeaders([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
            'Pragma' => 'no-cache',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateTutorRequest;
use App\Http\Requests\AdminAttemptRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }


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


        // Check is user active
        if ((int) Auth::user()->is_active !== 1) {
            throw ValidationException::withMessages(['username' => 'Akun tidak aktif!']);
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



    public function profile()
    {
        $title = "Profile";
        $data_nav = ['user', 'profile'];
        return view('admin/profile', compact('title', 'data_nav'));
    }

    public function edit()
    {
        $title = 'Profile';
        $data_nav = ['user', 'profile'];
        $user = Auth::user();
        return view("admin/tutor/edit", compact('title', 'data_nav', 'user'));
    }

    public function update(UpdateTutorRequest $request)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $password =  Hash::make($data['password']);
            $data['password'] = $password;
        } else {
            unset($data['password']);
        }

        if (!empty($request->foto)) {
            // Store image
            $file_foto = $request->file('foto');
            $renameFoto = $this->moveFile('user-image', 'Image', $file_foto);
            $this->removeFile('user-image/', $request->old_foto);
        }
        $data['foto'] = $renameFoto ?? $request->old_foto;

        $datas = array_merge($data, $this->userUpdate);
        $user =  User::find(Auth::user()->id);
        $user->update($datas);
        $this->flashSuccessUpdate($request);

        return redirect()->route('profile',);
    }
}

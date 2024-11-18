<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $userCreateUpdate = null;
    protected $userUpdate = null;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check() === true) {
                $this->userCreateUpdate = [
                    'user_create' => Auth::user()->id,
                    'user_update' => Auth::user()->id,
                ];
                $this->userUpdate = [
                    'user_update' => Auth::user()->id,
                ];
            }

            return $next($request);
        });
    }


    public function flashSuccessCreate($request, $message = 'Berhasil membuat data!')
    {
        return $request->session()->flash('success-status', $message);
    }

    public function flashSuccessUpdate($request, $message = 'Berhasil mengubah data!')
    {
        return $request->session()->flash('success-status', $message);
    }
    public function flashSuccessLogin($request, $message = 'Berhasil login!')
    {
        return   $request->session()->flash('success-status', $message);
    }
    public function flashSuccessLogout($request, $message = 'Berhasil logout!')
    {
        return $request->session()->flash('success-status', $message);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function flashSuccess()
    {
        session()->flash('success-status', 'Task was successful!');
    }
}

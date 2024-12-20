<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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


    public function removeFile($path, $file)
    {
        if (File::exists(public_path($path . $file))) {
            File::delete(public_path($path . $file));
        }
    }
    /**
     * This func is provide to move file
     */
    public function moveFile($path, $tipe, $file)
    {
        Log::info("Proses Save " . $tipe . " Start!");
        $getExtension = $file->extension();
        $rename = $path . time() . Auth::user()->id  . '.' . $getExtension;
        $file->move(public_path($path), $rename);
        Log::info("Proses Save " . $tipe . " Finish!");
        return $rename;
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

    private function flashSuccess()
    {
        session()->flash('success-status', 'Task was successful!');
    }
}

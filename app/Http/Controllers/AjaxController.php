<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\ValidationResult;

class AjaxController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function fetchTutor()
    {

        $users = $this->user->where('tipe_user', 3)->where('is_active', '1')->get();

        if ($users === null) {
            throw new HttpResponseException(response()->json(['success' => false, 'message' => 'data not found!'], 404));
        }

        return response()->json(['success' => true, 'datas' => $users], 200);
    }
}

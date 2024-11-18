<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    protected $kelas;
    protected $path = 'admin/kelas';
    public function __construct()
    {
        $this->kelas = new Kelas();
    }




    public function index()
    {
        $title = 'List Kelas';
        $data_nav  = ['lms', 'kelas'];
        $kelas = $this->kelas->with('user')->with('kategori')->get();
        return view("$this->path/index", compact('title', 'kelas', 'data_nav'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KelasKategori;
use App\Http\Requests\KelasKategoriRequest;
use Illuminate\Support\Str;

class KelasKategoriController extends Controller
{
    protected $kelasKategori;
    protected $path = 'admin/kelas-kategori';

    public function __construct()
    {
        parent::__construct();
        $this->kelasKategori = new KelasKategori();
    }

    public function index()
    {
        $title = 'List Kategori Kelas';
        $data_nav = ['lms', 'kelas-kategori'];
        $kategori = $this->kelasKategori->with('updatedBy')->get();
        return view("$this->path/index", compact('title', 'kategori', 'data_nav'));
    }

    public function create()
    {
        $title = 'Tambah Kategori Kelas';
        $data_nav = ['lms', 'kelas-kategori'];
        return view("$this->path/create", compact('title', 'data_nav'));
    }

    public function store(KelasKategoriRequest $request)
    {
        $data = $request->validated();

        $this->kelasKategori->create($data);
        return redirect()->to('/admin/kelas/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Edit Kategori Kelas';
        $data_nav = ['lms', 'kelas-kategori'];
        $kategori = $this->kelasKategori->findOrFail($id);
        return view("$this->path/edit", compact('title', 'data_nav', 'kategori'));
    }

    public function update(KelasKategoriRequest $request, $id)
    {
        $data = $request->validated();
        $kategori = $this->kelasKategori->findOrFail($id);

        $kategori->update($data);
        return redirect()->to('/admin/kelas/kategori')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $kategori = $this->kelasKategori->findOrFail($id);
        
        $kategori->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
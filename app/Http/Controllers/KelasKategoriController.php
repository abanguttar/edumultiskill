<?php

namespace App\Http\Controllers;

use App\Models\KelasKategori;
use App\Http\Requests\KelasKategoriStoreRequest;
use App\Http\Requests\KelasKategoriUpdateRequest;
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
        $data_nav = ['data-master', 'kategori-kelas'];
        $kategori = $this->kelasKategori->with('updatedBy')->get();
        return view("$this->path/index", compact('title', 'kategori', 'data_nav'));
    }

    public function create()
    {
        $title = 'Tambah Kategori Kelas';
        $data_nav = ['data-master', 'kategori-kelas'];
        return view("$this->path/create", compact('title', 'data_nav'));
    }

    public function store(KelasKategoriStoreRequest $request)
    {
        $data = $request->validated();
        
        // Create slug from nama_kategori
        $slug = Str::slug($data['nama_kategori']);
        
        // Handle file upload
        if ($request->hasFile('icon_kategori')) {
            $file = $request->file('icon_kategori');
            $extension = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $extension;
            
            // Move file to public/icons directory
            $file->move(public_path('icons'), $filename);
            
            // Save path to database
            $data['icon_kategori'] = 'icons/' . $filename;
        }

        $this->kelasKategori->create($data);
        return redirect()->to('/admin/kelas/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Edit Kategori Kelas';
        $data_nav = ['data-master', 'kategori-kelas'];
        $kategori = $this->kelasKategori->findOrFail($id);
        return view("$this->path/edit", compact('title', 'data_nav', 'kategori'));
    }

    public function update(KelasKategoriUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $kategori = $this->kelasKategori->findOrFail($id);
        
        // Create slug from nama_kategori
        $slug = Str::slug($data['nama_kategori']);
        
        // Handle file upload if new file is uploaded
        if ($request->hasFile('icon_kategori')) {
            $file = $request->file('icon_kategori');
            $extension = $file->getClientOriginalExtension();
            $filename = $slug . '.' . $extension;
            
            // Delete old file if exists
            if ($kategori->icon_kategori && file_exists(public_path($kategori->icon_kategori))) {
                unlink(public_path($kategori->icon_kategori));
            }
            
            // Move new file to public/icons directory
            $file->move(public_path('icons'), $filename);
            
            // Save new path to database
            $data['icon_kategori'] = 'icons/' . $filename;
        }

        $kategori->update($data);
        return redirect()->to('/admin/kelas/kategori')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $kategori = $this->kelasKategori->findOrFail($id);
        
        // Delete icon file if exists
        if ($kategori->icon_kategori && file_exists(public_path($kategori->icon_kategori))) {
            unlink(public_path($kategori->icon_kategori));
        }
        
        $kategori->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KelasKategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateDeskripsiRequest;
use Illuminate\Validation\ValidationException;

class KelasController extends Controller
{
    protected $kelas;
    protected $kelas_kategori;
    protected $metode_pelatihan;
    protected $path = 'admin/kelas';
    public function __construct()
    {
        parent::__construct();
        $this->kelas = new Kelas();
        $this->kelas_kategori = KelasKategori::get();
        $this->metode_pelatihan = DB::table('metode_pelatihans')->get();
    }


    /**
     * This func is provide to move file
     */
    private function moveFile($path, $tipe, $file)
    {
        Log::info("Proses Save " . $tipe . " Start!");
        $getExtension = $file->extension();
        $rename = $path . time() . Auth::user()->id  . '.' . $getExtension;
        $file->move(public_path($path), $rename);
        Log::info("Proses Save " . $tipe . " Finish!");
        return $rename;
    }

    public function index()
    {
        $title = 'List Kelas';
        $data_nav  = ['lms', 'kelas'];
        $kelas = $this->kelas->with('user')->with('kategori')->get();
        return view("$this->path/index", compact('title', 'kelas', 'data_nav'));
    }


    public function create()
    {
        $title = 'Kelas Create';
        $data_nav  = ['lms', 'kelas'];
        $kelas_kategories = $this->kelas_kategori;
        $metode_pelatihans = $this->metode_pelatihan;
        $kelas_id = null;
        $btn_group = 'kelas';
        return view("$this->path/create", compact('title',  'btn_group', 'kelas_id', 'data_nav', 'kelas_kategories', 'metode_pelatihans'));
    }



    public function store(StoreKelasRequest $request)
    {

        $request->validated();
        $data_okupasi = null;
        $data_tag_kelas = null;
        $renameImage = null;
        $rename_video = null;
        // $hargaValidationService->validate($request);

        $slug = Str::slug($request->judul_kelas);
        $check_judul_kelas = Kelas::where('slug', $slug)->exists();
        if ($check_judul_kelas) {
            throw ValidationException::withMessages(['judul_kelas' => 'Judul kelas sudah ada!']);
            return redirect()->back()->withInput();
        }

        /**
         * Insert data
         */
        $data =  $request->validated();
        if ($request->image != null) {
            // Store image
            $file_image = $request->file('image');
            $renameImage = $this->moveFile('kelas-image', 'Image', $file_image);
        }

        if ($request->video_file != null) {
            // Store video
            $file_video = $request->file('video_file');
            $rename_video =   $this->moveFile('kelas-video', 'Video', $file_video);
        }




        $data['slug'] = Str::slug($data['judul_kelas']);
        $jenjang_pendidikan = implode(',', $data['jenjang_pendidikan']);
        $data['jenjang_pendidikan'] = $jenjang_pendidikan;
        $data['image'] = $renameImage;
        $data['video'] = $rename_video;
        $datas = array_merge($data, $this->userCreateUpdate);
        // dd($datas);
        $this->kelas->create($datas);
        $this->flashSuccessCreate($request);
        return redirect()->to("/$this->path");
    }


    public function informasiView($id)
    {
        $title = 'Kelas Informasi';
        $data_nav  = ['lms', 'kelas'];
        $kelas_kategories = $this->kelas_kategori;
        $metode_pelatihans = $this->metode_pelatihan;
        $kelas_id = $id;
        $btn_group = 'kelas';
        $kelas = $this->kelas->findOrFail($id);
        return view("$this->path/informasi", compact('title',  'btn_group', 'kelas_id', 'data_nav', 'kelas', 'kelas_kategories', 'metode_pelatihans'));
    }


    public function informasiUpdate(StoreKelasRequest $request, $id)
    {

        $data_okupasi = null;
        $data_tag_kelas = null;
        $renameImage = $request->old_image;
        $rename_video = $request->old_video;
        // $hargaValidationService->validate($request);

        $slug = Str::slug($request->judul_kelas);
        $check_judul_kelas = Kelas::where('slug', $slug)->whereNot('id', $id)->exists();
        if ($check_judul_kelas) {
            throw ValidationException::withMessages(['judul_kelas' => 'Judul kelas sudah ada!']);
            return redirect()->back()->withInput();
        }


        if (!empty($request->image)) {
            $image_path = public_path('kelas-image/', $request->old_image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            // Store image
            $file_image = $request->file('image');
            $renameImage = $this->moveFile('kelas-image', 'Image', $file_image);
        }

        if (!empty($request->video_file)) {
            $video_path = public_path('kelas-video/', $request->old_video);
            if (File::exists($video_path)) {
                File::delete($video_path);
            }
            // Store video
            $file_video = $request->file('video_file');
            $rename_video =   $this->moveFile('kelas-video', 'Video', $file_video);
        }



        /**
         * Update data
         */
        $data =  $request->validated();

        $data['slug'] = $slug;
        $jenjang_pendidikan = implode(',', $data['jenjang_pendidikan']);
        $data['jenjang_pendidikan'] = $jenjang_pendidikan;
        $data['image'] = $renameImage;
        $data['video'] = $rename_video;
        $datas = array_merge($data, $this->userUpdate);
        $kelas = $this->kelas->findOrFail($id);
        $kelas->update($datas);
        $this->flashSuccessUpdate($request);
        return redirect()->route('view-informasi', ['id' => $id]);
    }

    public function deskripsiView($id)
    {
        $title = 'Kelas Informasi';
        $data_nav  = ['lms', 'kelas'];
        $kelas_id = $id;
        $btn_group = 'kelas-deskripsi';
        $kelas = $this->kelas->with('deskripsi')->findOrFail($id);
        return view("$this->path/deskripsi", compact('title',  'btn_group', 'kelas_id', 'data_nav', 'kelas',));
    }



    public function deskripsiUpdate(UpdateDeskripsiRequest $request, $id)
    {
        $data = $request->validated();
        if (!empty($data['sertifikat_tenaga_pelatih'][0])) {
            $tenaga_pelatih = implode(',', $data['sertifikat_tenaga_pelatih']);
            $data['sertifikat_tenaga_pelatih'] = $tenaga_pelatih;
        } else {
            $data['sertifikat_tenaga_pelatih'] = null;
        }

        KelasDetail::where('kelas_id', $id)->update($data);
        $this->flashSuccessUpdate($request);

        return redirect()->route('view-deskripsi', ['id' => $id]);
    }
}

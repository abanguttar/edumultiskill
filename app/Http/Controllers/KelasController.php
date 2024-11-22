<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KelasKategori;
use App\Models\Skkni;
use App\Models\KodeUnit;
use App\Models\JadwalPelatihan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateDeskripsiRequest;
use App\Http\Requests\JadwalKelasRequest;
use App\Http\Requests\UpdateSKKNIRequest;
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
        $this->jadwal = new JadwalPelatihan();
        $this->metode_pelatihan = DB::table('metode_pelatihans')->get();
    }


    /**
     * Create function to validate if is dicount set to aktif verify harga discount must have value
     */

    private function verifyIsDiscount($is_dicount, $harga_discount)
    {
        if ($is_dicount === '1' && $harga_discount === 0) {
            throw ValidationException::withMessages(['harga_discount' => "Jika diskon diaktifkan harga diskon tidak boleh 0!"]);
        }
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
        $programs = DB::table('programs')->get();
        $kelas_id = null;
        $btn_group = 'kelas';
        return view("$this->path/create", compact('title', 'programs', 'btn_group', 'kelas_id', 'data_nav', 'kelas_kategories', 'metode_pelatihans'));
    }



    public function store(StoreKelasRequest $request)
    {

        $data =  $request->validated();
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


        // Verify is discount aktif?
        $this->verifyIsDiscount($data['is_discount'], (int)$data['harga_discount']);

        /**
         * Insert data
         */
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
        $programs = DB::table('programs')->get();
        $kelas = $this->kelas->findOrFail($id);
        return view("$this->path/informasi", compact('title',  'programs', 'btn_group', 'kelas_id', 'data_nav', 'kelas', 'kelas_kategories', 'metode_pelatihans'));
    }


    public function informasiUpdate(StoreKelasRequest $request, $id)
    {
        /**
         * Update data
         */
        $data =  $request->validated();
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




        // Verify is discount aktif?
        $this->verifyIsDiscount($data['is_discount'], (int)$data['harga_discount']);


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
        $title = 'Kelas Deskripsi';
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
            $array = array_filter($data['sertifikat_tenaga_pelatih'], function ($x) {
                return $x;
            });
            $tenaga_pelatih = implode(',', $array);
            $data['sertifikat_tenaga_pelatih'] = $tenaga_pelatih;
        } else {
            $data['sertifikat_tenaga_pelatih'] = null;
        }

        KelasDetail::where('kelas_id', $id)->update($data);
        $this->flashSuccessUpdate($request);

        return redirect()->route('view-deskripsi', ['id' => $id]);
    }

    public function skkniView($id)
    {
        $title = 'SKKNI dan Kode Unit';
        $data_nav  = ['lms', 'kelas'];
        $kelas_id = $id;
        $btn_group = 'kelas-skkni';
        $kelas = $this->kelas->with('deskripsi')->findOrFail($id);
        return view("$this->path/skkni", compact('title',  'btn_group', 'kelas_id', 'data_nav', 'kelas'));
    }

    public function skkniUpdate(UpdateSKKNIRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $userId = auth()->id();
            KelasDetail::where('kelas_id', $id)->update([
                'sertifikat_judul_skkni' => $request->sertifikat_judul_skkni,
                'sertifikat_judul_kode_unit' => $request->sertifikat_judul_kode_unit,
            ]);

            // Handle SKKNI
            if (!$request->has('skkni')) {
                Skkni::where('kelas_id', $id)->delete();
            } else {
                if ($request->has('skkni_ids')) {
                    Skkni::where('kelas_id', $id)
                        ->whereNotIn('id', $request->skkni_ids)
                        ->delete();
                } else {
                    Skkni::where('kelas_id', $id)->delete();
                }

                foreach ($request->skkni as $index => $skkniValue) {
                    if (!empty($skkniValue)) {
                        if (isset($request->skkni_ids[$index])) {


                            Skkni::where('id', $request->skkni_ids[$index])
                                ->update([
                                    'skkni' => $skkniValue,
                                    'update_by' => $userId
                                ]);
                        } else {
                            Skkni::create([
                                'kelas_id' => $id,
                                'skkni' => $skkniValue
                            ]);
                        }
                    }
                }
            }

            // Handle Kode Unit
            if (!$request->has('kode_unit')) {
                KodeUnit::where('kelas_id', $id)->delete();
            } else {
                if ($request->has('kode_unit_ids')) {
                    KodeUnit::where('kelas_id', $id)
                        ->whereNotIn('id', $request->kode_unit_ids)
                        ->delete();
                } else {
                    KodeUnit::where('kelas_id', $id)->delete();
                }

                foreach ($request->kode_unit as $index => $kodeUnitValue) {
                    if (!empty($kodeUnitValue)) {
                        $keteranganValue = $request->keterangan[$index] ?? null;

                        if (isset($request->kode_unit_ids[$index])) {
                            KodeUnit::where('id', $request->kode_unit_ids[$index])
                                ->update([
                                    'update_by' => $userId,
                                    'kode_unit' => $kodeUnitValue,
                                    'keterangan' => $keteranganValue
                                ]);
                        } else {
                            KodeUnit::create([
                                'kelas_id' => $id,
                                'kode_unit' => $kodeUnitValue,
                                'keterangan' => $keteranganValue
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('view-skkni', ['id' => $id])
                ->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }

    public function jadwalView($id)
    {
        $title = 'Jadwal Pelatihan';
        $data_nav  = ['lms', 'kelas'];
        $kelas_id = $id;
        $btn_group = 'jadwal';
        $kelas = $this->kelas->with('JadwalPelatihans')->findOrFail($id);
        return view("$this->path/jadwal/view", compact('title',  'btn_group', 'kelas_id', 'data_nav', 'kelas'));
    }

    public function jadwalViewArsip($id)
    {
        $title = 'Arsip Jadwal Pelatihan';
        $data_nav  = ['lms', 'kelas'];
        $kelas_id = $id;
        $btn_group = 'jadwal';
        $kelas = $this->kelas->with('JadwalPelatihans')->findOrFail($id);
        return view("$this->path/jadwal/arsip", compact('title',  'btn_group', 'kelas_id', 'data_nav', 'kelas'));
    }

    public function jadwalCreate($id)
    {
        $title = 'Tambah Jadwal Pelatihan';
        $data_nav  = ['lms', 'kelas'];
        $kelas_id = $id;
        $btn_group = 'jadwal';
        return view("$this->path/jadwal/create", compact('title',  'btn_group', 'kelas_id', 'data_nav'));
    }

    public function jadwalStore(JadwalKelasRequest $request, $id)
    {
        JadwalPelatihan::create($request->validated());

        return redirect()
            ->route('view-jadwal', $id)
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function jadwalEdit($id, $jadwal_id)
    {
        $title = 'Edit Jadwal Pelatihan';
        $data_nav  = ['lms', 'kelas'];
        $kelas_id = $id;
        $btn_group = 'jadwal';
        $jadwal = $this->jadwal->findOrFail($jadwal_id);
        if ($jadwal->waktu_pelaksanaan) {
            preg_match(
                '/(\d{2}\.\d{2})\s*(WIB|WITA|WIT)\s*s\/d\s*(\d{2}\.\d{2})\s*(WIB|WITA|WIT)/',
                $jadwal->waktu_pelaksanaan,
                $matches
            );

            if (count($matches) === 5) {
                $jadwal->waktu_mulai = str_replace('.', ':', $matches[1]);
                $jadwal->waktu_selesai = str_replace('.', ':', $matches[3]);
                $jadwal->zona_waktu = $matches[2];
            }
        }
        return view("$this->path/jadwal/edit", compact('title',  'btn_group', 'kelas_id', 'data_nav', 'jadwal'));
    }

    public function jadwalUpdate(JadwalKelasRequest $request, $id, $jadwal_id)
    {
        $jadwal = $this->jadwal->findOrFail($jadwal_id);
        $jadwal->update($request->validated());

        return redirect()
            ->route('view-jadwal', $id)
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function jadwalDelete($id, $jadwal_id)
    {
        $jadwal = $this->jadwal->findOrFail($jadwal_id);
        $jadwal->delete();

        return redirect()
            ->route('view-jadwal', $id)
            ->with('success', 'Jadwal berhasil dihapus');
    }

    public function jadwalArsip($id, $jadwal_id)
    {
        $jadwal = JadwalPelatihan::findOrFail($jadwal_id);
        if ($jadwal->diarsipkan == 0) {
            $jadwal->update(['diarsipkan' => '1']);
        } else {
            $jadwal->update(['diarsipkan' => '0']);
        }

        return redirect()
            ->route('view-jadwal', $id)
            ->with('success', 'Jadwal berhasil diarsipkan');
    }
}

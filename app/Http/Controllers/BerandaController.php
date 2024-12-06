<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\StoreTestimoniRequest;
use Illuminate\Validation\ValidationException;

class BerandaController extends Controller
{

    protected $path = 'admin/beranda';
    protected $link;
    protected $banner;
    protected $logo_mitra;
    protected $testimoni;

    public function __construct()
    {
        parent::__construct();
        $this->link = DB::table('links as l');
        $this->banner = DB::table('banners');
        $this->logo_mitra = DB::table('logo_mitras');
        $this->testimoni = DB::table('testimonies');
    }

    private function moveFile($path, $tipe, $file)
    {
        Log::info("Proses Save " . $tipe . " Start!");
        $getExtension = $file->extension();
        $rename = $path . time() . Auth::user()->id . $tipe . '.' . $getExtension;
        $file->move(public_path($path), $rename);
        Log::info("Proses Save " . $tipe . " Finish!");
        return $rename;
    }




    public function index()
    {
        $title = 'Beranda';
        $data_nav  = ['cms', 'beranda'];
        $links = $this->link->join('users as u', 'l.user_update', '=', 'u.id')->select('l.*', 'u.name')->get();
        $banners = $this->banner->join('users as u', 'banners.user_update', '=', 'u.id')->select('banners.*', 'u.name')->orderBy('banners.urutan')->get();
        $logos = $this->logo_mitra->join('users as u', 'logo_mitras.user_update', '=', 'u.id')->select('logo_mitras.*', 'u.name as name_user')->orderBy('logo_mitras.urutan')->get();
        $testimonies = $this->testimoni->join('users as u', 'testimonies.user_update', '=', 'u.id')->select('testimonies.*', 'u.name as name_user')->orderBy('testimonies.urutan')->get();
        return view("$this->path/index", compact('title', 'links', 'banners', 'logos', 'testimonies', 'data_nav'));
    }

    public function createBanner()
    {
        $title = 'Create New Banner';
        $data_nav  = ['cms', 'beranda'];
        return view("$this->path/banner-create", compact('title', 'data_nav'));
    }


    public function storeBanner(StoreBannerRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['dekstop'])) {
            $file_dekstop = $request->file('dekstop');
            $data['dekstop'] = $this->moveFile('assets', 'dekstop', $file_dekstop);
        }
        if (!empty($data['mobile'])) {
            $file_mobile = $request->file('mobile');
            $data['mobile'] = $this->moveFile('assets', 'mobile', $file_mobile);
        }

        $datas = array_merge($this->userCreateUpdate, $data);
        $is_urutan_exist = $this->banner->where('urutan', $data['urutan'])->count();
        if ($is_urutan_exist !== 0) {
            throw  ValidationException::withMessages(['urutan' => 'Urutan sudah ada!']);
            return redirect()->back()->withInput();
        }

        $datas['created_at'] = Carbon::now();
        $datas['updated_at'] = Carbon::now();
        $this->banner->insert($datas);
        $this->flashSuccessCreate($request);
        return redirect()->route('list-beranda');
    }

    public function editBanner($id)
    {
        $title = 'Edit Banner';
        $data_nav  = ['cms', 'beranda'];
        $banner = $this->banner->where('id', $id)->first();
        return view("$this->path/banner-edit", compact('title', 'data_nav', 'banner'));
    }

    public function updateBanner(StoreBannerRequest $request, $id)
    {
        $data = $request->validated();

        if (!empty($data['dekstop'])) {
            $file_dekstop = $request->file('dekstop');
            $data['dekstop'] = $this->moveFile('assets', 'dekstop', $file_dekstop);
            $this->removeFile('assets/', $data['old_dekstop']);
        } else {
            $data['dekstop'] = $data['old_dekstop'];
        }


        if (!empty($data['mobile'])) {
            $file_mobile = $request->file('mobile');
            $data['mobile'] = $this->moveFile('assets', 'mobile', $file_mobile);
            $this->removeFile('assets/', $data['old_mobile']);
        } else {
            $data['mobile'] = $data['old_mobile'];
        }


        $datas = array_merge($this->userUpdate, $data);
        $is_urutan_exist =  $this->banner->where('urutan', $data['urutan'])->whereNot('id', $id)->count();
        if ($is_urutan_exist !== 0) {
            throw  ValidationException::withMessages(['urutan' => 'Urutan sudah ada!']);
            return redirect()->back()->withInput();
        }

        $datas['updated_at'] = Carbon::now();
        unset($datas['old_mobile'], $datas['old_dekstop']);
        DB::table('banners')->where('id', $id)->update($datas);
        $this->flashSuccessUpdate($request);
        return redirect()->route('edit-banner', ['id' => $id]);
    }

    public function createLogo()
    {
        $title = 'Create New Logo';
        $data_nav  = ['cms', 'beranda'];
        return view("$this->path/logo-create", compact('title', 'data_nav'));
    }


    public function storeLogo(StoreLogoRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['logo'])) {
            $file_logo = $request->file('logo');
            $data['logo'] = $this->moveFile('assets', 'logo', $file_logo);
        }

        $datas = array_merge($this->userCreateUpdate, $data);
        $is_urutan_exist = $this->logo_mitra->where('urutan', $data['urutan'])->count();
        if ($is_urutan_exist !== 0) {
            throw  ValidationException::withMessages(['urutan' => 'Urutan sudah ada!']);
            return redirect()->back()->withInput();
        }

        $datas['created_at'] = Carbon::now();
        $datas['updated_at'] = Carbon::now();
        $this->logo_mitra->insert($datas);
        $this->flashSuccessCreate($request);
        return redirect()->route('list-beranda');
    }


    public function editLogo($id)
    {
        $title = 'Edit Logo';
        $data_nav  = ['cms', 'beranda'];
        $logo = $this->logo_mitra->where('id', $id)->first();
        return view("$this->path/logo-edit", compact('title', 'data_nav', 'logo'));
    }

    public function updateLogo(StoreLogoRequest $request, $id)
    {
        $data = $request->validated();

        if (!empty($data['logo'])) {
            $file_logo = $request->file('logo');
            $data['logo'] = $this->moveFile('assets', 'logo', $file_logo);
            $this->removeFile('assets/', $data['old_logo']);
        } else {
            $data['logo'] = $data['old_logo'];
        }


        $datas = array_merge($this->userUpdate, $data);
        $is_urutan_exist =  $this->logo_mitra->where('urutan', $data['urutan'])->whereNot('id', $id)->count();
        if ($is_urutan_exist !== 0) {
            throw  ValidationException::withMessages(['urutan' => 'Urutan sudah ada!']);
            return redirect()->back()->withInput();
        }

        $datas['updated_at'] = Carbon::now();
        unset($datas['old_logo']);
        DB::table('logo_mitras')->where('id', $id)->update($datas);
        $this->flashSuccessUpdate($request);
        return redirect()->route('edit-logo', ['id' => $id]);
    }

    public function createTestimoni()
    {
        $title = 'Create New Testimoni';
        $data_nav  = ['cms', 'beranda'];
        return view("$this->path/testimoni-create", compact('title', 'data_nav'));
    }


    public function storeTestimoni(StoreTestimoniRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['image'])) {
            $file_image = $request->file('image');
            $data['image'] = $this->moveFile('assets', 'testimoni', $file_image);
        }

        $datas = array_merge($this->userCreateUpdate, $data);
        $is_urutan_exist = $this->testimoni->where('urutan', $data['urutan'])->count();
        if ($is_urutan_exist !== 0) {
            throw  ValidationException::withMessages(['urutan' => 'Urutan sudah ada!']);
            return redirect()->back()->withInput();
        }

        $datas['created_at'] = Carbon::now();
        $datas['updated_at'] = Carbon::now();
        $this->testimoni->insert($datas);
        $this->flashSuccessCreate($request);
        return redirect()->route('list-beranda');
    }


    public function editTestimoni($id)
    {
        $title = 'Edit Banner';
        $data_nav  = ['cms', 'beranda'];
        $testimoni = $this->testimoni->where('id', $id)->first();
        return view("$this->path/testimoni-edit", compact('title', 'data_nav', 'testimoni'));
    }

    public function updateTestimoni(StoreTestimoniRequest $request, $id)
    {
        $data = $request->validated();

        if (!empty($data['image'])) {
            $file_image = $request->file('image');
            $data['image'] = $this->moveFile('assets', 'testimoni', $file_image);
            $this->removeFile('assets/', $data['old_image']);
        } else {
            $data['image'] = $data['old_image'];
        }


        $datas = array_merge($this->userUpdate, $data);
        $is_urutan_exist =  $this->logo_mitra->where('urutan', $data['urutan'])->whereNot('id', $id)->count();
        if ($is_urutan_exist !== 0) {
            throw  ValidationException::withMessages(['urutan' => 'Urutan sudah ada!']);
            return redirect()->back()->withInput();
        }

        $datas['updated_at'] = Carbon::now();
        unset($datas['old_image']);
        DB::table('testimonies')->where('id', $id)->update($datas);
        $this->flashSuccessUpdate($request);
        return redirect()->route('edit-testimoni', ['id' => $id]);
    }


    public function updateLink(Request $request)
    {
        $url = $request->input('url');
        $datas = array_merge(['url' => $url], $this->userUpdate);
        $datas['updated_at'] = Carbon::now();
        $this->link->where('id', 1)->update($datas);

        return response()->json([
            'success' => true,
            'message' => 'update ok!'
        ], 200);
    }
}

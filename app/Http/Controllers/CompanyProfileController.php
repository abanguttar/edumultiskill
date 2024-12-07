<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\StoreImageSaranaRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreSaranaPrasaranaRequest;

class CompanyProfileController extends Controller
{
    protected $path = 'admin/company-profile';
    protected $gallery;
    protected $sarana_prasarana;
    protected $image_sarana;

    public function __construct()
    {
        parent::__construct();
        $this->gallery = DB::table('gallery');
        $this->sarana_prasarana = DB::table('sarana_prasaranas');
        $this->image_sarana = DB::table('image_saranas');
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
        $title = 'Company Profile';
        $data_nav  = ['cms', 'company-profile'];
        $gallery = $this->gallery->join('users as u', 'gallery.user_update', '=', 'u.id')->select('gallery.*', 'u.name')->get();
        $sarana_prasaranas = $this->sarana_prasarana->join('users as u', 'sarana_prasaranas.user_update', '=', 'u.id')->select('sarana_prasaranas.*', 'u.name as update_name')->get();
        $image_saranas = $this->image_sarana->join('users as u', 'image_saranas.user_update', '=', 'u.id')->select('image_saranas.*', 'u.name')->get();
        return view("$this->path/index", compact('title', 'sarana_prasaranas', 'gallery', 'data_nav', 'image_saranas'));
    }


    public function creategallery()
    {
        $title = 'Create New Gallery';
        $data_nav  = ['cms', 'company-profile'];
        return view("$this->path/gallery-create", compact('title', 'data_nav'));
    }


    public function storegallery(StoreGalleryRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['image'])) {
            $file = $request->file('image');
            $data['image'] = $this->moveFile('gallery', 'image', $file);
        } else {

            $data['image'] = '';
        }

        $datas = array_merge($this->userCreateUpdate, $data);

        $datas['created_at'] = Carbon::now();
        $datas['updated_at'] = Carbon::now();
        $this->gallery->insert($datas);
        $this->flashSuccessCreate($request);
        return redirect()->route('list-company-profile');
    }

    public function editgallery($id)
    {
        $title = 'Edit Gallery';
        $data_nav  = ['cms', 'company-profile'];
        $gallery = $this->gallery->where('id', $id)->first();
        return view("$this->path/gallery-edit", compact('title', 'data_nav', 'gallery'));
    }

    public function updategallery(StoreGalleryRequest $request, $id)
    {
        $data = $request->validated();

        if (!empty($data['image'])) {
            $file = $request->file('image');
            $data['image'] = $this->moveFile('gallery', 'image', $file);
            $this->removeFile('image/', $data['old_image']);
        } else {

            $data['image'] = $data['old_image'];
        }

        $datas = array_merge($this->userUpdate, $data);

        $datas['created_at'] = Carbon::now();
        unset($datas['old_image']);
        DB::table('gallery')->where('id', $id)->update($datas);
        $this->flashSuccessUpdate($request);
        return redirect()->route('edit-gallery', ['id' => $id]);
    }

    public function createsaranaprasarana()
    {
        $title = 'Create New Sarana Prasarana';
        $data_nav  = ['cms', 'company-profile'];
        return view("$this->path/sarana-prasarana-create", compact('title', 'data_nav'));
    }

    public function storesaranaprasarana(StoreSaranaPrasaranaRequest $request)
    {
        $data = $request->validated();

        /**
         * Check is nama fasilitas already exists?
         */

        $is_name_exists = $this->sarana_prasarana->where('name', trim($data['name']))->count('id');
        if ($is_name_exists !== 0) {
            return ValidationException::withMessages(['name' => 'Nama Fasilitas sudah ada!']);
        }

        $datas = array_merge($this->userCreateUpdate, $data);
        $datas['created_at'] = Carbon::now();
        $datas['updated_at'] = Carbon::now();
        $this->sarana_prasarana->insert($datas);
        $this->flashSuccessCreate($request);
        return redirect()->route('list-company-profile');
    }

    public function editsaranaprasarana($id)
    {
        $title = 'Edit Sarana Prasarana';
        $data_nav  = ['cms', 'company-profile'];
        $sarana_prasarana = $this->sarana_prasarana->where('id', $id)->first();
        return view("$this->path/sarana-prasarana-edit", compact('title', 'data_nav', 'sarana_prasarana'));
    }


    public function updatesaranaprasarana(StoreSaranaPrasaranaRequest $request, $id)
    {
        $data = $request->validated();
        $datas = array_merge($this->userUpdate, $data);
        $datas['updated_at'] = Carbon::now();
        DB::table('sarana_prasaranas')->where('id', $id)->update($datas);
        $this->flashSuccessUpdate($request);
        return redirect()->route('edit-sarana-prasarana', ['id' => $id]);
    }

    public function createimagesarana()
    {
        $title = 'Create New Sarana Gallery';
        $data_nav  = ['cms', 'company-profile'];
        return view("$this->path/image-sarana-create", compact('title', 'data_nav'));
    }


    public function storeimagesarana(StoreImageSaranaRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['image'])) {
            $file = $request->file('image');
            $data['image'] = $this->moveFile('image-sarana', 'image', $file);
        } else {
            $data['image'] = '';
        }

        $datas = array_merge($this->userCreateUpdate, $data);

        $datas['created_at'] = Carbon::now();
        $datas['updated_at'] = Carbon::now();
        $this->image_sarana->insert($datas);
        $this->flashSuccessCreate($request);
        return redirect()->route('list-company-profile');
    }

    public function editimagesarana($id)
    {
        $title = 'Edit Sarana Gallery';
        $data_nav  = ['cms', 'company-profile'];
        $image_sarana = $this->image_sarana->where('id', $id)->first();
        return view("$this->path/image-sarana-edit", compact('title', 'data_nav', 'image_sarana'));
    }

    public function updateimagesarana(StoreImageSaranaRequest $request, $id)
    {
        $data = $request->validated();

        if (!empty($data['image'])) {
            $file = $request->file('image');
            $data['image'] = $this->moveFile('image-sarana', 'image', $file);
            $this->removeFile('image-sarana/', $data['old_image']);
        } else {
            $data['image'] = $data['old_image'];
        }

        $datas = array_merge($this->userUpdate, $data);
        $datas['updated_at'] = Carbon::now();
        unset($datas['old_image']);
        DB::table('image_saranas')->where('id', $id)->update($datas);
        $this->flashSuccessUpdate($request);
        return redirect()->route('edit-image-sarana', ['id' => $id]);
    }
}

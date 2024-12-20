<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreTutorRequest;
use App\Http\Requests\UpdateTutorRequest;

class TutorController extends Controller
{
    protected $user;
    protected $path = 'admin/tutor';

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }


    public function index()
    {
        $title = 'List Tutor';
        $data_nav  = ['data-master', 'list-tutor'];
        $users = $this->user->with('updated_name')->where('tipe_user', 3)->get();
        return view("$this->path/index", compact('title', 'users', 'data_nav'));
    }


    public function create()
    {
        $title = 'Create New Tutor';
        $data_nav  = ['data-master', 'list-tutor'];
        return view("$this->path/create", compact('title', 'data_nav'));
    }

    public function store(StoreTutorRequest $request)
    {
        $data = $request->validated();
        $password =  Hash::make($data['password']);
        $data['password'] = $password;
        $data['tipe_user'] = 3;
        $datas = array_merge($data, $this->userCreateUpdate);
        $this->user->create($datas);
        $this->flashSuccessCreate($request);
        return redirect()->route('list-tutor');
    }

    public function edit($id)
    {
        $title = 'Edit Tutor';
        $data_nav  = ['data-master', 'list-tutor'];
        $user = $this->user->find($id);
        return view("$this->path/edit", compact('title', 'data_nav', 'user'));
    }

    public function update(UpdateTutorRequest $request, $id)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $password =  Hash::make($data['password']);
            $data['password'] = $password;
        } else {
            unset($data['password']);
        }


        if (!empty($request->foto)) {
            // Store image
            $file_foto = $request->file('foto');
            $renameFoto = $this->moveFile('user-image', 'Image', $file_foto);
            $this->removeFile('user-image/', $request->old_foto);
        }
        $data['foto'] = $renameFoto ?? $request->old_foto;


        $datas = array_merge($data, $this->userUpdate);
        $user = $this->user->findOrFail($id);
        $user->update($datas);
        $this->flashSuccessUpdate($request);

        return redirect()->route('tutor-edit', ['id' => $id]);
    }
}

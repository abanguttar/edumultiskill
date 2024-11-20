<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $user;
    protected $path = 'admin/index';

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }


    public function index()
    {
        $title = 'List Admin';
        $data_nav  = ['data-master', 'list-admin'];
        $users = $this->user->with('updated_name')->get();
        // dd($users[0]->updated_name[0]->name);
        return view("$this->path/view", compact('title', 'users', 'data_nav'));
    }


    public function create()
    {
        $title = 'Create New Admin';
        $data_nav  = ['data-master', 'list-admin'];
        return view("$this->path/create", compact('title', 'data_nav'));
    }


    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $password =  Hash::make($data['password']);
        $data['password'] = $password;
        $datas = array_merge($data, $this->userCreateUpdate);
        $this->user->create($datas);
        $this->flashSuccessCreate($request);
        return redirect()->to('/admin/index');
    }


    public function edit($id)
    {
        $title = 'Edit Admin';
        $data_nav  = ['data-master', 'list-admin'];
        $user = $this->user->find($id);
        return view("$this->path/edit", compact('title', 'data_nav', 'user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $password =  Hash::make($data['password']);
            $data['password'] = $password;
        } else {
            unset($data['password']);
        }
        $datas = array_merge($data, $this->userUpdate);
        $user = $this->user->findOrFail($id);
        $user->update($datas);
        $this->flashSuccessUpdate($request);

        return redirect()->to('/admin/index');
    }
}

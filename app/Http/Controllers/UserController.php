<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

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


    public function permissionView($id)
    {
        $title = 'Edit Admin';
        $data_nav  = ['data-master', 'list-admin'];
        $user = $this->user->find($id);
        $permissions = DB::table('permissions')->orderBy('group')->orderBy('name')->get();
        $temp = [];

        foreach ($permissions as $permission) {
            $temp[$permission->group][$permission->name][] = (object)[
                'name' => $permission->access,
                'id' => $permission->id
            ];
        }

        $permissions = $temp;
        $user_permissions = DB::table('user_permissions')->where('user_id', $id)->pluck('permission_id')->toArray();
        return view("$this->path/permission", compact('title', 'data_nav', 'user', 'user_permissions', 'permissions'));
    }


    public function permissionUpdate(Request $request, $id)
    {
        $access = $request->access;
        $datas = [];
        $user_permissions = DB::table('user_permissions');
        $truncate = $user_permissions;
        $truncate->truncate();
        if ($access !== null) {
            foreach ($access as $item) {
                array_push($datas, ['user_id' => $id, 'permission_id' => $item]);
            }
            $user_permissions->insert($datas);
        }
        $this->flashSuccessUpdate($request);
        return redirect()->route('view-permission', ['id' => $id]);
    }
}

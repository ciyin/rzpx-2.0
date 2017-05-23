<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $role;
    protected $user;

    public function __construct(RoleRepository $role,UserRepository $user)
    {
        $this->role=$role;
        $this->user=$user;
    }

    /**
     * 角色列表页
     */
    public function index()
    {
        $roles=$this->role->roleList();
        $userRoles=$this->user->getUserRoles();
        return view('role/rolePage',['roles'=>$roles,'userRoles'=>$userRoles]);
    }

    /**
     * 搜索角色表单提交地址
     */
    public function create()
    {
        $roles=$this->role->searchRole();
        $userRoles=$this->user->getUserRoles();
        return view('role/rolePage',['roles'=>$roles,'userRoles'=>$userRoles]);
    }

    /**
     * 新增角色表单提交地址
     */
    public function store(StoreRole $request)
    {
        $this->role->storeRole($request);
        return redirect('/role');
    }

    /**
     * 更新角色表单提交地址
     */
    public function update(StoreRole $request, $id)
    {
        $this->role->updateRole($request,$id);
        return redirect('/role');
    }

}

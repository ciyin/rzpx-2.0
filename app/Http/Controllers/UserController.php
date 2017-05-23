<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    protected $role;
    public function __construct(UserRepository $user,RoleRepository $role)
    {
        $this->user=$user;
        $this->role=$role;
    }

    /**
     * 用户列表页
     * $roles：新增及编辑用户表单中的角色单选项赋值
     */
    public function index()
    {
        $list=$this->user->userList();
        $roles=$this->role->roleList();
        $userRoles=$this->user->getUserRoles();
        return view('user/userPage',['users'=>$list,'roles'=>$roles,'userRoles'=>$userRoles]);
    }

    /**
     * 搜索用户表单提交地址
     *
     */
    public function create()
    {
        $list=$this->user->searchUser();
        $roles=$this->role->roleList();
        $userRoles=$this->user->getUserRoles();
        return view('user/userPage',['users'=>$list,'roles'=>$roles,'userRoles'=>$userRoles]);
    }

    /**
     * 新增用户表单提交地址
     *
     */
    public function store(StoreUser $request)
    {
        $this->user->storeUser($request);
        return redirect('/user');
    }

    /**
     * 修改密码表单、停用账号、角色关联表单的提交地址
     * 1:change password; 2:update status; 3:role associate
     */
    public function update(Request $request, $id)
    {
        switch ($request->type){
            case 1:
                $this->user->changePassword($request,$id);
                break;
            case 2:
                $this->user->updateStatus($id);
                break;
            case 3:
                $this->user->changeRole($request,$id);
                break;
        }
        return redirect('/user');
    }
}

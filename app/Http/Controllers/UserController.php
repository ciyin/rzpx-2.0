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
        return view('user/userPage',['users'=>$list,'roles'=>$roles]);
    }

    /**
     * 搜索表单提交地址
     *
     */
    public function create()
    {
        $list=$this->user->searchUser();
        $roles=$this->role->roleList();
        return view('user/userPage',['users'=>$list,'roles'=>$roles]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     *
     *
     */
    public function edit($id)
    {

    }

    /**
     * 修改密码表单提交地址
     * 1:change password; 2:update status; 3:add role
     */
    public function update(Request $request, $id)
    {
        if ($request->type=='1'){
            $this->user->changePassword($request,$id);
        }else if ($request->type=='2'){
            $this->user->updateStatus($id);
        }else if ($request->type=='3'){
            $this->user->changeRole($request,$id);
        }
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

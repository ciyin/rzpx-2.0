<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 2017/5/17
 * Time: 17:38
 */
namespace App\Repositories;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{

//    用户列表
    public function userList()
    {
        $list = User::with('roles')->get();
        return $list;
    }

//    保存用户信息及用户角色关联记录
    public function storeUser($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->city = $request->city;
        $user->status = $request->status;
        $user->created_by = Auth::id();
        $roles = $request->role;
        if (count($roles) > 0) {
            for ($i = 0; $i < count($roles); $i++) {
                Role::find($roles[$i])->users()->save($user);
            }
        }
    }

//    修改密码
    public function changePassword($request,$id){
        $user=User::find($id);
        $user->password=bcrypt($request->password);
        $user->save();
    }

//    更改使用状态为停用
    public function updateStatus($id){
        $user=User::find($id);
        $user->status='停用';
        $user->save();
    }

//    修改角色关联
    public function changeRole($request,$id){
        $roles=$request->role;
        $user=User::find($id);
//        先删除该用户之前的角色记录
        foreach ($user->roles as $role){
            $user->roles()->detach($role->id);
        }
//        再添加修改后的角色记录
        if (count($roles)>0){
            for ($i=0;$i<count($roles);$i++){
                $user->roles()->attach($roles[$i]);
            }
        }
    }

//    搜索用户
    public function searchUser(){
        $list = User::with('roles')->where('name','like','%'.$_GET['searchUser'].'%')->get();
        return $list;
    }
}
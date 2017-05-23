<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 2017/5/17
 * Time: 17:38
 */
namespace App\Repositories;

use App\Http\Requests\ChangePassword;
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

//    修改角色关联:因不确定用户是怎样修改用户的关联，所以采用把之前的所有关联记录都删除，然后根据传过来的role再添加。
//    这样删除角色或者新增角色都在同一个界面内完成
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

//    判断用户的身份：1为管理员，2为人力，3为其他
    public function getUserRoles(){
        $user=Auth::user();
        $roles=$user->roles()->get();
        $userRoles='';
        foreach ($roles as $role){
            $userRoles.=$role->id;
        }
        if (str_contains($userRoles,'1')){
            return '1';
        }elseif (str_contains($userRoles,'2')){
            return '2';
        }else{
            return '0';
        }
    }
}
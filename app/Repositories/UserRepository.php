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
        $list = User::all();
        return $list;
    }

//    保存用户信息及用户角色关联记录
    public function addUser($request)
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
                Role::find($roles[$i])->roleBelongsToManyUsers()->save($user);
            }
        }
    }
}
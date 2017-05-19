<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 2017/5/17
 * Time: 17:05
 */

namespace App\Repositories;

use App\Role;
use Illuminate\Support\Facades\Auth;

class RoleRepository{

//    新增角色记录
    public function storeRole($request){
        $role=new Role();
        $role->role=$request->role;
        $role->created_by=Auth::id();
        $role->save();
    }

//    更新角色记录
    public function updateRole($request,$id){
        $role=Role::find($id);
        $role->role=$request->role;
        $role->save();
    }

//    取出所有角色记录
    public function roleList(){
        $list=Role::all();
        return $list;
    }

//    按角色名搜索角色列表
    public function searchRole(){
        $list=Role::where('role','like','%'.$_GET['searchRole'].'%')->get();
        return $list;
    }
}
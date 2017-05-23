<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Role;
use Illuminate\Support\Facades\Auth;

class RoleVideoController extends Controller
{

//    培训内容页面
    public function index(UserRepository $theRoles)
    {
        $user=Auth::user();
        $userRoles=$theRoles->getUserRoles();
        if ($userRoles==1 || $userRoles==2){
            $roles=Role::all();
        }else{
            $roles=$user->roles()->get();
        }
        return view('training/trainingPage',['roles'=>$roles,'userRoles'=>$userRoles]);
    }

//    培训内容详情页
    public function show($id)
    {
//        取出该角色的所有视频，并按类型排序
//        这里要求添加视频分类时需按照留学酷、crm、1course这样来添加，因为先接触的一般是留学酷才是CRM
        $videos=Role::find($id)->videos()->with('videoType')->orderBy('video_type_id','asc')->get();
        $list=$videos->groupBy('video_type_id');
        return view('training/trainingDetail',['videos'=>$list]);
    }

}

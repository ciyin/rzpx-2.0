<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideo;
use App\Repositories\RoleRepository;
use App\Repositories\TypeRepository;
use App\Repositories\UserRepository;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $video;
    protected $type;
    protected $role;
    protected $user;
    public function __construct(VideoRepository $video,TypeRepository $type,RoleRepository $role,UserRepository $user)
    {
        $this->video=$video;
        $this->type=$type;
        $this->role=$role;
        $this->user=$user;
    }

//    视频列表页
//    $types：新增视频中的视频分类；$roles：关联角色表单中的角色列表；
    public function index()
    {
        $videos=$this->video->videoList();
        $types=$this->type->typeList();
        $roles=$this->role->roleList();
        $userRoles=$this->user->getUserRoles();
        $rows=count($videos);
        return view('video/videoPage',['videos'=>$videos,'types'=>$types,'roles'=>$roles,'userRoles'=>$userRoles,'rows'=>$rows]);
    }

    /**
     * 搜索视频表单提交地址
     */
    public function create()
    {
        $videos=$this->video->searchVideo();
        $types=$this->type->typeList();
        $roles=$this->role->roleList();
        $userRoles=$this->user->getUserRoles();
        return view('video/videoPage',['videos'=>$videos,'types'=>$types,'roles'=>$roles,'userRoles'=>$userRoles]);
    }

    /**
     * 新增视频表单提交地址
     */
    public function store(StoreVideo $request)
    {
        $this->video->storeVideo($request);
        return redirect('/video');
    }

    /**
     * 编辑视频表单和角色关联表单的提交地址
     * 1:update video; 2:role associate
     */
    public function update(Request $request, $id)
    {
        switch ($request->type){
            case 1:
                $this->video->updateVideo($request,$id);
                break;
            case 2:
                $this->video->attachRole($request,$id);
                break;
        }
        return redirect('/video');
    }
}

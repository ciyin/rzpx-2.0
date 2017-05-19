<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideo;
use App\Repositories\RoleRepository;
use App\Repositories\TypeRepository;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $video;
    protected $type;
    protected $role;
    public function __construct(VideoRepository $video,TypeRepository $type,RoleRepository $role)
    {
        $this->video=$video;
        $this->type=$type;
        $this->role=$role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=$this->video->videoList();
//        dd($videos->toArray());
        $types=$this->type->typeList();
        $roles=$this->role->roleList();
        return view('video/videoPage',['videos'=>$videos,'types'=>$types,'roles'=>$roles]);
    }

    /**
     * 搜索教材表单提交地址
     */
    public function create()
    {
        $videos=$this->video->searchVideo();
        $types=$this->type->typeList();
        $roles=$this->role->roleList();
        return view('video/videoPage',['videos'=>$videos,'types'=>$types,'roles'=>$roles]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 编辑教材表单提交地址
     */
    public function update(Request $request, $id)
    {
        if ($request->type=='1'){
            $this->video->updateVideo($request,$id);
        }else if ($request->type=='2'){
            $this->video->attachRole($request,$id);
        }
        return redirect('/video');
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

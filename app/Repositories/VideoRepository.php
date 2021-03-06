<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 2017/5/18
 * Time: 17:16
 */
namespace App\Repositories;

use App\Video;
use App\VideoType;

class VideoRepository{

//    视频列表
    public function videoList(){
        $list=Video::with(['videoType','roles'])->paginate(20);
        return $list;
    }

//    保存视频
    public function storeVideo($request){
        $video=new Video();
        $video->video=$request->video;
        $video->saved_at=$request->saved_at;
        $video->time=$request->time;
        $video->teacher=$request->teacher;
        $video->content=$request->content;
        $video->status=$request->status;
        VideoType::find($request->type_id)->videos()->save($video);
    }

//    更新视频信息
    public function updateVideo($request,$id){
        $video=Video::find($id);
        $video->video=$request->video;
        $video->saved_at=$request->saved_at;
        $video->time=$request->time;
        $video->teacher=$request->teacher;
        $video->content=$request->content;
        $video->status=$request->status;
        VideoType::find($request->type_id)->videos()->save($video);
    }

//    按视频名称搜索
    public function searchVideo(){
        $list=Video::with('videoType')->where('video','like','%'.$_GET['searchVideo'].'%')->get();
        return $list;
    }

//    关联角色：因不知用户会如何修改角色的关联，有可能是删除一个或添加一个，所以先把之前的关联记录全删除了，再保存此次的选择
//    这样，不管是删除还是新增，都可以在一个界面内完成
    public function attachRole($request,$id){
        $res=$request->role;
        $video=Video::find($id);
//        先删除该视频之前的角色关联记录
        foreach ($video->roles as $role){
            $video->roles()->detach($role->id);
        }
//        保存此次的所关联的角色
        if (count($request->role)>0){
            for ($i=0;$i<count($request->role);$i++){
                $video->roles()->attach($res[$i]);
            }
        }
    }

}
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
        $list=Video::with(['videoType','roles'])->get();
        return $list;
    }

//    保存视频
    public function storeVideo($request){
        $video=new Video();
        $video->video=$request->video;
        $video->saved_at=$request->saved_at;
        $video->time=$request->time;
        $video->speaker=$request->speaker;
        $video->content=$request->content;
        VideoType::find($request->type_id)->videos()->save($video);
    }

//    更新视频信息
    public function updateVideo($request,$id){
        $video=Video::find($id);
        $video->video=$request->video;
        $video->saved_at=$request->saved_at;
        $video->time=$request->time;
        $video->speaker=$request->speaker;
        $video->content=$request->content;
        VideoType::find($request->type_id)->videos()->save($video);
    }

//    按视频名称搜索
    public function searchVideo(){
        $list=Video::with('videoType')->where('video','like','%'.$_GET['searchVideo'].'%')->get();
        return $list;
    }

//    关联角色
    public function attachRole($request,$id){
        $res=$request->role;
        $video=Video::find($id);
        foreach ($video->roles as $role){
            $video->roles()->detach($role->id);
        }
        if (count($request->role)>0){
            for ($i=0;$i<count($request->role);$i++){
                $video->roles()->attach($res[$i]);
            }
        }
    }

}
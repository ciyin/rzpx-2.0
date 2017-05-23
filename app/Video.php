<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=[
        'video','time','saved_at','speaker','contents',
    ];

//    关联角色：多对多
//    一个视频适用于多种角色，一个角色拥有多个视频
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
//    关联分类：一对多
//    一个视频属于一个分类，一个分类下有多个视频
    public function videoType(){
        return $this->belongsTo('App\VideoType');
    }
}

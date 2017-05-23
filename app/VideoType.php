<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoType extends Model
{
    protected $fillable=[
        'type','created_by',
    ];
//    关联视频：一对多
//    一个分类下有多个视频，一个视频属于一个分类
    public function videos(){
        return $this->hasMany('APP\Video');
    }
}

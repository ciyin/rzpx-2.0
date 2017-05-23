<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=[
        'role','created_by'
    ];

//    关联用户模型：多对多
//    一个角色可以有多个用户，一个用户也可以有多种角色
    public function users(){
        return $this->belongsToMany('App\User');
    }

//    关联视频模型：多对多
//    一个角色可以有多个视频，一个视频也可以适用于多个角色
    public function videos(){
        return $this->belongsToMany('App\Video');
    }
}

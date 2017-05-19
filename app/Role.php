<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=[
        'role','created_by'
    ];

//    关联用户模型：多对多
    public function users(){
        return $this->belongsToMany('App\User');
    }

//    关联视频模型：多对多
    public function videos(){
        return $this->belongsToMany('App\Video');
    }
}

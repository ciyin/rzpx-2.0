<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=[
        'video','time','saved_at','speaker','contents',
    ];

//    关联角色：多对多
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
//    关联分类：一对多
    public function videoType(){
        return $this->belongsTo('App\VideoType');
    }
}

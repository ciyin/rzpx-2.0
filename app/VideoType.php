<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoType extends Model
{
//    关联视频：一对多
    public function videos(){
        return $this->hasMany('APP\Video');
    }
}

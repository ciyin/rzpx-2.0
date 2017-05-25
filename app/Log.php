<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
//    关联用户模型：一对多。一个用户可以拥有多条记录。
    public function user(){
        return $this->belongsTo('App\User');
    }
}

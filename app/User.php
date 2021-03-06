<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username','password','status','city','created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    关联角色模型：多对多
//    一个用户可以有多种角色，一个角色也可以有多个用户
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

//    关联培训记录模型：一对多。一个用户可以有多条培训记录
    public function logs(){
        return $this->hasMany('App\Log');
    }

}

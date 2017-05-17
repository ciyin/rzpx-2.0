<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=[
        'role','created_by'
    ];

    public function roleBelongsToManyUsers(){
        return $this->belongsToMany('App\User');
    }

}

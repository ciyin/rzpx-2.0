<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 2017/5/25
 * Time: 11:33
 */
namespace App\Repositories;

use App\Log;
use App\User;
use Illuminate\Support\Facades\Auth;

class LogRepository{

//    保存记录
    public function storeLog($video){
        $user=Auth::id();
        $log=new Log();
        $log->video=$video;
        User::find($user)->logs()->save($log);
    }
//    记录列表
    public function logList(){
        $logs=Log::with('user')->orderBy('created_at','desc')->simplePaginate(20);
        return $logs;
    }
}
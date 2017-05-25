<?php

namespace App\Http\Controllers;

use App\Repositories\LogRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class LogController extends Controller
{
    protected $Log;
    protected $user;

    public function __construct(LogRepository $log,UserRepository $user)
    {
        $this->log=$log;
        $this->user=$user;
    }

//    记录列表
    public function index()
    {
        $logs=$this->log->logList();
        $userRoles=$this->user->getUserRoles();
        return view('log/logPage',['logs'=>$logs,'userRoles'=>$userRoles]);
    }

//    当点击视频链接时，保存点击记录
    public function create()
    {
        $this->log->storeLog($_GET['video']);
    }
}

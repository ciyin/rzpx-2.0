<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreType;
use App\Repositories\TypeRepository;
use App\Repositories\UserRepository;

class VideoTypeController extends Controller
{
    protected $type;
    protected $user;
    public function __construct(TypeRepository $type,UserRepository $user)
    {
        $this->type=$type;
        $this->user=$user;
    }

    /**
     * 分类列表
     */
    public function index()
    {
        $list=$this->type->typeList();
        $userRoles=$this->user->getUserRoles();
        return view('type/typePage',['types'=>$list,'userRoles'=>$userRoles]);
    }

    /**
     * 搜索分类表单提交地址
     */
    public function create()
    {
        $list=$this->type->searchType();
        $userRoles=$this->user->getUserRoles();
        return view('type/typePage',['types'=>$list,'userRoles'=>$userRoles]);
    }

    /**
     * 新增分类表单提交地址
     *
     */
    public function store(StoreType $request)
    {
        $this->type->storeType($request);
        return redirect('/type');
    }

    /**
     * 编辑分类表单提交地址
     *
     */
    public function update(StoreType $request, $id)
    {
        $this->type->updateType($request,$id);
        return redirect('/type');
    }
}

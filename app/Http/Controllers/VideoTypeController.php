<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreType;
use App\Repositories\TypeRepository;
use Illuminate\Http\Request;

class VideoTypeController extends Controller
{
    protected $type;
    public function __construct(TypeRepository $type)
    {
        $this->type=$type;
    }

    /**
     * 分类列表
     */
    public function index()
    {
        $list=$this->type->typeList();
        return view('type/typePage',['types'=>$list]);
    }

    /**
     * 搜索分类表单提交地址
     */
    public function create()
    {
        $list=$this->type->searchType();
        return view('type/typePage',['types'=>$list]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

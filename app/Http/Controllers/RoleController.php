<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRole;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    protected $role;

    public function __construct(RoleRepository $role)
    {
        $this->role=$role;
    }

    /**
     * 角色列表页
     */
    public function index()
    {
        $roles=$this->role->roleList();
        return view('role/rolePage',['roles'=>$roles]);
    }

    /**
     * 搜索角色
     */
    public function create()
    {
        $roles=$this->role->searchRole();
        return view('role/rolePage',['roles'=>$roles]);
    }

    /**
     * 新增角色
     */
    public function store(StoreRole $request)
    {
        $this->role->storeRole($request);
        return redirect('/role');
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
     * 更新角色信息
     *
     */
    public function update(StoreRole $request, $id)
    {
        $this->role->updateRole($request,$id);
        return redirect('/role');
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-xs-12">
                @if($userRoles==1)
                    @include('nav/admin')
                @elseif($userRoles==2)
                    @include('nav/hr')
                @elseif($userRoles==0)
                    @include('nav/user')
                @endif
            </div>
            <div class="col-lg-10 col-md-10 col-xs-12">
                <div class="row">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(count($roles)==0)
                        <div class="alert alert-danger">
                            <ul>
                                <li>没有找到相关记录！</li>
                            </ul>
                        </div>
                    @endif

                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addRole">
                            新增
                        </button>
                        @include('role/addRole')
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div style="float: right;margin-left: 5px">
                            <a href="{{route('role.index')}}" target="_self"><button type="button" class="btn btn-default btn-sm">重置</button></a>
                        </div>
                        <div style="float: right">
                            <form method="get" action="{{route('role.create')}}">
                                <input type="text" name="searchRole" placeholder="请输入角色搜索">
                                <button type="submit" class="btn btn-default btn-sm">搜索</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        @include('role/roleList')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
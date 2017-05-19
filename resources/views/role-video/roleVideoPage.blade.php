@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-xs-12">
                <ul>
                    <li><a>角色管理</a></li>
                </ul>
            </div>
            <div class="col-lg-10 col-md-10 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="jumbotron">
                            <h1>
                                @foreach($users as $role)
                                    {{$role->name}},你好！
                                @endforeach
                            </h1>
                            <p><small>以下为岗位所需的日常办公软件操作视频讲解，请在上岗前观看完毕！</small></p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <table class="table table-responsive">
                            <tr>
                                <td>序号</td>
                                <td>角色</td>
                                <td>培训模块</td>
                                <td>视频列表</td>
                            </tr>
                            @foreach($users as $role)
                                @foreach($role['roles'] as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->role}}</td>
                                        <td>11111</td>
                                        <td><a href="{{route('training.show',$item->id)}}" target="_blank"><button type="button" class="btn btn-primary btn-sm">查看</button></a></td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
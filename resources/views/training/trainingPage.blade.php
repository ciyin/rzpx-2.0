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
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="jumbotron">
                            <h1>
                                {{Auth::user()->name}}，你好！
                            </h1>
                            <p><small>以下为岗位所需的日常办公软件操作视频讲解，请在上岗前观看完毕！</small></p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <table class="table table-responsive">
                            <tr>
                                <td width="20%">序号</td>
                                <td width="30%">岗位</td>
                                <td width="40%">操作</td>
                            </tr>
                            @foreach($roles as $role)
                                <tr>
                                    <td width="10%">{{$role->id}}</td>
                                    <td width="30%">{{$role->role}}</td>
                                    <td width="40%">
                                        <a href="{{route('training.show',$role->id)}}" target="_blank">
                                            <button type="button" class="btn btn-primary btn-sm">观看视频</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
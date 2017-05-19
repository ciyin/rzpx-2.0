@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                @foreach($videos as $video )
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="info">
                                <td width="15%">所属系统</td>
                                <td width="30%">观看地址</td>
                                <td width="40%">内容简介</td>
                                <td width="15%">时长</td>
                            </tr>
                            @foreach($video as $item)
                                <tr>
                                    <td width="15%">{{$item->VideoType->type}}</td>
                                    <td width="30%"><a href="{{$item->saved_at}}" target="_blank">{{$item->video}}</a></td>
                                    <td width="40%">{{$item->content}}</td>
                                    <td width="15%">{{$item->time}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <script>
        function storeLog(video) {
            var xhr=new XMLHttpRequest();
            xhr.open('get','/log/create?video='+video,true);
            xhr.send();
        }
    </script>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                @foreach($videos as $video ){{--将videos按video_type分类--}}
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="info">
                                <td width="10%">所属系统</td>
                                <td width="15%">观看地址</td>
                                <td width="68%">内容简介</td>
                                <td width="7%">时长</td>
                            </tr>
                            @foreach($video as $item){{--取出该分类下的视频列表--}}
                                <tr>
                                    <td width="10%">{{$item->VideoType->type}}</td>
                                    <td width="15%"><a href="{{$item->saved_at}}" target="_blank" onclick="storeLog(this.innerText)">{{$item->video}}</a></td>
                                    <td width="68%">{{$item->content}}</td>
                                    <td width="7%">{{$item->time}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
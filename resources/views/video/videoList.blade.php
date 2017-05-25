<table class="table table-responsive">
    <tr>
        <td>序号</td>
        <td>视频</td>
        <td>分类</td>
        <td>时长</td>
        <td>录制人</td>
        <td>状态</td>
        <td>关联角色</td>
        <td>操作</td>
    </tr>

    @foreach($videos as $video)
        <tr>
            <td>{{$video->id}}</td>
            <td>{{$video->video}}</td>
            <td>{{$video->videoType->type}}</td>
            <td>{{$video->time}}</td>
            <td>{{$video->teacher}}</td>
            <td>{{$video->status}}</td>
            <td>
                @foreach($video->roles as $role)
                    <span>{{$role->role}}/</span>
                @endforeach
            </td>
            <td>
                {{--弹出编辑视频信息表单--}}
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editVideo{{$video->id}}">
                    编辑
                </button>
                @include('video/editVideo')
                {{--弹出关联角色表单--}}
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#attachRole{{$video->id}}">
                    角色
                </button>
                @include('video/attachRole')
                {{--弹出查看视频地址和内容简介的表单--}}
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#content{{$video->id}}">
                    内容
                </button>
                @include('video/content')
            </td>
        </tr>
    @endforeach
</table>
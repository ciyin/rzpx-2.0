<table class="table table-responsive">
    <tr class="info">
        <td>序号</td>
        <td>用户</td>
        <td>视频</td>
        <td>时间</td>
    </tr>

    @foreach($logs as $log)
        <tr>
            <td>{{$log->id}}</td>
            <td>{{$log->user->name}}</td>
            <td>{{$log->video}}</td>
            <td>{{$log->created_at}}</td>
        </tr>
    @endforeach
</table>
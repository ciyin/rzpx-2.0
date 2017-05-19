<table class="table table-responsive">
    <tr>
        <td>序号</td>
        <td>姓名</td>
        <td>用户名</td>
        <td>角色</td>
        <td>城市</td>
        <td>状态</td>
        <td>创建时间</td>
        <td>操作</td>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>
                @foreach($user->roles as $value)
                    <span>{{$value->role}}/</span>
                @endforeach
            </td>
            <td>{{$user->city}}</td>
            <td>{{$user->status}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#changePassword{{$user->id}}">
                    密码
                </button>
                @include('user/changePassword')
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#updateStatus{{$user->id}}">
                    停用
                </button>
                @include('user/updateStatus')
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#changeRole{{$user->id}}">
                    角色
                </button>
                @include('user/changeRole')
            </td>
        </tr>
    @endforeach
</table>
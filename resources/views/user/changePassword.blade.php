{{--修改密码--}}
<div class="modal fade" id="changePassword{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改密码</h4>
            </div>
            <form method="post" action="{{route('user.update',$user->id)}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="Name">姓名：</label>
                            <input type="text" class="form-control" id="Name" name="name" value="{{$user->name}}">
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="Password">新密码：</label>
                        <input type="password" class="form-control" id="Password" name="password">
                        <input type="hidden" name="type" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
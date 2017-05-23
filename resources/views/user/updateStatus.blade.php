{{--停用账号--}}
<div class="modal fade" id="updateStatus{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">停用账号</h4>
            </div>
            <form method="post" action="{{route('user.update',$user->id)}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    <p>确定停用该账号？</p>
                    {{--修改密码，修改角色，停用账号都是提交到user.update这个路由，所以用type来区分动作--}}
                    <input type="hidden" name="type" value="2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>
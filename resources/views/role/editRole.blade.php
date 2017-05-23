{{--编辑角色--}}
<div class="modal fade" id="editRole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改角色信息</h4>
            </div>
            <form method="post" action="{{route('role.update',$role->id)}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editRole">角色：</label>
                        <input type="text" class="form-control" id="editRole" name="role" value="{{$role->role}}">
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
{{--添加角色关联--}}
<div class="modal fade" id="changeRole{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加角色</h4>
            </div>
            <form method="post" action="{{route('user.update',$user->id)}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="editName">姓名：</label>
                            <input type="text" class="form-control" id="editName" name="name" value="{{$user->name}}">
                        </div>
                    </fieldset>
                    <input type="hidden" name="type" value="3">
                    <div>
                        <label>角色：</label>
                        @foreach($roles as $role)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="role[]" value="{{$role->id}}"
                                    @foreach($user->roles as $value)
                                        @if($value->id==$role->id)
                                            checked
                                        @endif
                                    @endforeach
                                > {{$role->role}}
                            </label>
                        @endforeach
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
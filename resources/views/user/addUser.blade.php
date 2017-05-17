{{--新增用户--}}
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新增用户</h4>
            </div>
            <form method="post" action="{{route('user.store')}}">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addName">姓名：</label>
                        <input type="text" class="form-control" id="addName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="addUsername">用户名：</label>
                        <input type="text" class="form-control" id="addUsername" name="username">
                    </div>
                    <div class="form-group">
                        <label for="addPassword">密码：</label>
                        <input type="password" class="form-control" id="addPassword" name="password">
                    </div>
                    <div>
                        <label>角色：</label>
                        @foreach($roles as $role)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="role[]" value="{{$role->id}}"> {{$role->role}}
                            </label>
                        @endforeach
                    </div>

                    <div>
                        <label>城市：</label>
                        <label class="radio-inline">
                            <input type="radio" name="city" value="上海"> 上海
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="city" value="北京"> 北京
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="city" value="广州"> 广州
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="city" value="成都"> 成都
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="city" value="长春"> 长春
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="city" value="沈阳"> 沈阳
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="city" value="大连"> 大连
                        </label>
                    </div>
                    <div>
                        <label>状态：</label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="使用中" checked> 启用
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="停用"> 停用
                        </label>
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
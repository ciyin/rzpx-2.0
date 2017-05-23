{{--关联角色--}}
<div class="modal fade" id="attachRole{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">关联角色</h4>
            </div>
            <form method="post" action="{{route('video.update',$video->id)}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    {{--关联角色和编辑视频都是传到video update这个地址，所以用type来区分动作--}}
                    <input type="hidden" name="type" value="2">
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="video">视频名称：</label>
                            <input type="text" class="form-control" id="video" name="video" value="{{$video->video}}">
                        </div>
                    </fieldset>
                    <div>
                        <label>角色：</label>
                        @foreach($roles as $role)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="role[]" value="{{$role->id}}"> {{$role->role}}
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
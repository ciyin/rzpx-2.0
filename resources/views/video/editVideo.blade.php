{{--编辑视频--}}
<div class="modal fade" id="editVideo{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">编辑视频</h4>
            </div>
            <form method="post" action="{{route('video.update',$video->id)}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    <input type="hidden" name="type" value="1">
                    <div class="form-group">
                        <label for="editVideo">视频名称：</label>
                        <input type="text" class="form-control" id="editVideo" name="video" value="{{$video->video}}">
                    </div>
                    <div class="form-group">
                        <label for="address">观看地址：</label>
                        <input type="text" class="form-control" id="address" name="saved_at" value="{{$video->saved_at}}">
                    </div>

                    <div class="form-group">
                        <label for="time">时长：</label>
                        <input type="text" class="form-control" id="time" name="time" value="{{$video->time}}">
                    </div>
                    <div class="form-group">
                        <label for="speaker">录制人：</label>
                        <input type="text" class="form-control" id="speaker" name="speaker" value="{{$video->speaker}}">
                    </div>
                    <div class="form-group">
                        <label for="content">内容简介：</label>
                        <textarea class="form-control" id="content" name="content" rows="2">{{$video->content}}</textarea>
                    </div>
                    <div>
                        <label>分类：</label>
                        @foreach($types as $type)
                            <label class="radio-inline">
                                <input type="radio" name="type_id" value="{{$type->id}}"
                                    @if($video->video_type_id==$type->id)
                                        checked
                                    @endif
                                > {{$type->type}}
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
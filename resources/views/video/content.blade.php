{{--查看视频简介--}}
<div class="modal fade" id="content{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">视频内容简介</h4>
            </div>
            <form method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <p>地址：{{$video->saved_at}}</p>
                    <p>内容简介：{{$video->content}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </form>
        </div>
    </div>
</div>
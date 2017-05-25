{{--通知短信文本--}}
<div class="modal fade" id="text{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">短信</h4>
            </div>
            <form>
                {{csrf_field()}}
                <div class="modal-body">
                    <p>
                        {{$user->name}}，你好，欢迎加入沃邦！请尽快登录academy.onebest.cn观看岗位相关办公系统操作讲解视频。
                        登录名为{{$user->username}}，登录密码及视频观看密码均为onebest。
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </form>
        </div>
    </div>
</div>
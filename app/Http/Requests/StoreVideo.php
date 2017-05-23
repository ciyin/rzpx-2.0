<?php

namespace App\Http\Requests;

use App\Repositories\UserRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreVideo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(UserRepository $user)
    {
        $role=$user->getUserRoles();
//        用户的角色为管理员时才能操作“新增视频”
        if ($role==1){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'video'=>'required|unique:videos,video',
            'saved_at'=>'required|unique:videos,saved_at',
            'time'=>'required',
            'speaker'=>'required',
            'content'=>'required',
            'type_id'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'video.required'=>'视频名称不能为空',
            'video.unique'=>'该视频名称已存在',
            'saved_at.required'=>'观看地址不能为空',
            'saved_at.unique'=>'该地址已存在',
            'time.required'=>'时长不能为空',
            'speaker.required'=>'录制人不能为空',
            'content.required'=>'内容简介不能为空',
            'type_id.required'=>'分类不能为空',
        ];
    }
}

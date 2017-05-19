<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'saved_at'=>'required',
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
            'time.required'=>'时长不能为空',
            'speaker.required'=>'录制人不能为空',
            'content.required'=>'内容简介不能为空',
            'type_id.required'=>'分类不能为空',
        ];
    }
}

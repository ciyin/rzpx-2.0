<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRole extends FormRequest
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
            'role'=>'required|unique:roles,role',
        ];
    }

    public function messages()
    {
        return [
            'role.required'=>'角色不能为空',
            'role.unique'=>'该角色名已存在',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Repositories\UserRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreType extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(UserRepository $user)
    {
        $role=$user->getUserRoles();
//        用户角色为管理员时才能操作“新增角色”
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
            'type'=>'required|unique:video_types,type',
        ];
    }

    public function messages()
    {
        return [
            'type.required'=>'分类不能为空',
            'type.unique'=>'该分类已存在',
        ];
    }
}

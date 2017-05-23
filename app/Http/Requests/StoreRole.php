<?php

namespace App\Http\Requests;

use App\Repositories\UserRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreRole extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(UserRepository $user)
    {
        $role=$user->getUserRoles();
//        用户为管理员角色时才能操作“新增角色”
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

<?php

namespace App\Http\Requests;

use App\Repositories\UserRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(UserRepository $user)
    {
        $role=$user->getUserRoles();
//        当用户的角色为管理员或人力时，才能操作“新增用户”
        if ($role==1 || $role==2){
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
            'name'=>'required',
            'username'=>'required|unique:users,username',
            'password'=>'required',
            'role'=>'required',
            'city'=>'required',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'姓名不能为空',
            'username.required'=>'用户名不能为空',
            'username.unique'=>'用户名已存在',
            'password.required'=>'密码不能为空',
            'role.required'=>'角色不能为空',
            'city.required'=>'城市不能为空',
            'status.required'=>'状态不能为空',
        ];
    }
}

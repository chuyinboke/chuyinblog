<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class UsersStoreRequest extends Request
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
        // 验证字段
        return [
             'username' => 'required|unique:user|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'password' => 'required|regex:/^[\w]{6,18}$/',
            'repassword' => 'required|same:password',
            'email' => 'required|email',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/'
        ];
    }
    public function messages()
    {
        return [
            // 字段错误提示信息
            'username.required' => '用户名不许为空',
            'username.regex' => '用户名格式错误',
            'username.unique' => '用户名已存在',
            'password.required' => '密码不许为空',
            'password.regex' => '密码格式不正确',
            'repassword.same' => '两次密码不一致',
            'repassword.required' => '确认密码不许为空',
            'email.email' => '邮箱格式不正确',
            'email.required' => '邮箱不许为空',
            'phone.required' => '手机号不许为空',
            'phone.regex' => '手机号格式不正确'    
        ];
    }
}

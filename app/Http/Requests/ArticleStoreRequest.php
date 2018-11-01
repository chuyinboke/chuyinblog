<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleStoreRequest extends Request
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
        'title' => 'required|unique:category|regex:/[^a-zA-Z0-9]/',
        'editrs' => 'required',
        'content' => 'required'
       ];
    }
    public function messages()
    {
        'title.required'=> '标题不能为空',
        'title.unique'=> '标题不能重复',
        'title.regex'=> '标题不能是符号',
        'editrs.required'=> '作者不能为空';
        'content.required'=> '内容不能为空';
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public $table ='user';
    // 用户对 个人信息 一对一
     public  function userperson()
     {
     	return $this->hasOne('App\Model\Person','uid');
     }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    //
    public $table ='user';
    use SoftDeletes;
    // 用户对 个人信息 一对一
     public  function userperson()
     {
     	return $this->hasOne('App\Model\Person','uid');
     }
     // 用户对文章  一对一
     public function userarticle()
     {
     	return $this->hasOne('App\Model\Article','tid');
     }
}

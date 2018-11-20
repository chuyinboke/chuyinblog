<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //连接操作数据库
   	public $table = 'comment';
   	//建立用户属于关系
   	public function usernameall()
   	{
   		return $this-> belongsTo('App\Model\user','id','uid');
   	}
   	//建立文章属于关系
   	 public function Articleall()
    {
    	return $this-> belongsTo('App\Model\Article','id','tid');
    }

}

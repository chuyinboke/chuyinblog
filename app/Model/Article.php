<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //连接控制Article
    public $table ='article';
    //创建属于关系 文章属于那一个分类
    public function articlecategory()
    {
    	return $this->belongsTo('App\Model\Category','path');
    }
}

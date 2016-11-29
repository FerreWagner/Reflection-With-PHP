<?php
  namespace app\index\controller;
  use think\Db;
  
  class Index{
    //闭包查询
    $result = Db::table('think_data')->select(function ($query){
      $query->where('name','like','%think%')->where('id','in','1,3,5')->limit(10);
    });
    var_dump($result);
  }



?>

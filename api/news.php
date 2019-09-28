<?php
//载入开发工具包
require'../vendor/autoload.php';

//查询多条记录
$dzApi->get("/news",function(){
	return excel("news")->orderBy(["id"=> 'desc'])->select();
});
//查询单条记录
$dzApi->get("/news/view",function($request){
	return excel("news")->where(["id"=>$request->get("id")])->find();
});
// 新增记录
$dzApi->post("/news/add",function($request){
	excel("news")->insert($request->all());
	return ["status" => "ok"];
});
// 删除记录
$dzApi->get("/news/delete",function($id){
	excel("news")->where(["id"=>$id])->delete();
});
// 更新记录（http://xibang.test/api/index.php/member/edit）
$dzApi->post("/news/edit", function($request){
    // 更新指定编号的记录
    excel("news")
        ->where(["id"=>$request->get("id")])
        ->update($request->all());
});
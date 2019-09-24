<?php
//载入开发工具包
require'../vendor/autoload.php';

//查询多条记录
$dzApi->get("/nav",function(){
	return excel("nav")->select();
});
//查询单条记录
$dzApi->get("/nav/view",function($request){
	return excel("nav")->where(["id"=>$request->get("id")])->find();
});
// 新增记录
$dzApi->post("/nav/add",function($request){
	excel("nav")->insert($request->all());
	return ["status" => "ok"];
});
// 删除记录
$dzApi->get("/nav/delete",function($id){
	excel("nav")->where(["id"=>$id])->delete();
});
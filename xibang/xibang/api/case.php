<?php
//载入开发工具包
require'../vendor/autoload.php';

//查询多条记录
$dzApi->get("/case",function(){
	return excel("case")->select();
});
//查询单条记录
$dzApi->get("/case/view",function($request){
	return excel("")->where(["id"=>$request->get("id")])->find();
});
// 新增记录
$dzApi->post("/case/add",function($request){
	excel("case")->insert($request->all());
	return ["status" => "ok"];
});
// 删除记录
$dzApi->get("/case/delete",function($id){
	excel("case")->where(["id"=>$id])->delete();
});
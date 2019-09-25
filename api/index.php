<?php
//载入开发工具包
require'../vendor/autoload.php';

//查询多条记录
$dzApi->get("/member",function(){
	return excel("member")->select();
});
//查询单条记录
$dzApi->get("/member/view",function($request){
	return excel("member")->where(["id"=>$request->get("id")])->find();
});
// 新增记录
$dzApi->post("/member/add",function($request){
	excel("member")->insert($request->all());
	return ["status" => "ok"];
});
// 删除记录
$dzApi->get("/member/delete",function($id){
	excel("member")->where(["id"=>$id])->delete();
});
// 更新记录
$dzApi->post("/member/edit",function(){
	excel("member")->where(["id"=>$id])->update($request->all());
});
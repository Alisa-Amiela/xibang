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
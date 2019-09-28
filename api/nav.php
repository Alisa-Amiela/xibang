<?php
//载入开发工具包
require'../vendor/autoload.php';

//查询多条记录
$dzApi->get("/nav",function(){
	return excel("nav")->orderBy(["id"=> 'desc'])->select();
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
// 更新记录（http://xibang.test/api/index.php/member/edit）
$dzApi->post("/nav/edit", function($request){
    // 更新指定编号的记录
    excel("nav")
        ->where(["id"=>$request->get("id")])
        ->update($request->all());
});
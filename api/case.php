<?php
//载入开发工具包
require'../vendor/autoload.php';

//查询多条记录
$dzApi->get("/case",function(){
	return excel("case")->orderBy(["id"=> 'desc'])->select();
});
//查询单条记录
$dzApi->get("/case/view",function($request){
	return excel("case")->where(["id"=>$request->get("id")])->find();
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
// 更新记录（http://xibang.test/api/index.php/member/edit）
$dzApi->post("/case/edit", function($request){
    // 更新指定编号的记录
    excel("case")
        ->where(["id"=>$request->get("id")])
        ->update($request->all());
});
// 上传照片
$dzApi->post("/upload", function($width, $height){
    $filename = uploader([
        'thumbWidth' => $width,
        'thumbHeight' => $height,
        'savePath' => dirname(__FILE__) . '/../uploads/'
    ])->saveAs();
    return ['filename' => $filename];
});
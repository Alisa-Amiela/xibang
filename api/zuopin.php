<?php
//载入开发工具包
require'../vendor/autoload.php';

//查询多条记录
$dzApi->get("/zuopin",function(){
	return excel("zuopin")->orderBy(["id"=> 'desc'])->select();
});
//查询单条记录
$dzApi->get("/zuopin/view",function($request){
	return excel("zuopin")->where(["id"=>$request->get("id")])->find();
});
// 新增记录
$dzApi->post("/zuopin/add",function($request){
	excel("zuopin")->insert($request->all());
	return ["status" => "ok"];
});
// 删除记录
$dzApi->get("/zuopin/delete",function($id){
	excel("zuopin")->where(["id"=>$id])->delete();
});
// 更新记录（http://xibang.test/api/index.php/member/edit）
$dzApi->post("/zuopin/edit", function($request){
    // 更新指定编号的记录
    excel("zuopin")
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
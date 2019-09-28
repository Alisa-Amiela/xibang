<?php
//载入开发工具包
require'../vendor/autoload.php';

//查询多条记录
$dzApi->get("/ad",function(){
	return excel("ad")->orderBy(["id"=> 'desc'])->select();
});
//查询单条记录
$dzApi->get("/ad/view",function($request){
	return excel("ad")->where(["id"=>$request->get("id")])->find();
});
// 新增记录
$dzApi->post("/ad/add",function($request){
	excel("ad")->insert($request->all());
	return ["status" => "ok"];
});
// 删除记录
$dzApi->get("/ad/delete",function($id){
	excel("ad")->where(["id"=>$id])->delete();
});
// 更新记录（http://xibang.test/api/index.php/member/edit）
$dzApi->post("/ad/edit", function($request){
    // 更新指定编号的记录
    excel("ad")
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
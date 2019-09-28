<?php
// 载入开发工具包
require '../vendor/autoload.php';

// 文件上传
// http://xibang.test/api/index.php/upload?width=512&height=384
// http://xibang.test/api/index.php/upload?width=1024&height=768
// http://xibang.test/api/index.php/upload?width=1920&height=1440
// 上传照片
$dzApi->post("/upload", function($width, $height){
    $filename = uploader([
        'thumbWidth' => $width,
        'thumbHeight' => $height,
        'savePath' => dirname(__FILE__) . '/../uploads/'
    ])->saveAs();
    return ['filename' => $filename];
});


// 查询多条记录
$dzApi->get("/member", function(){
    return excel("member")->select();
});
$dzApi->get("/single",function(){
    return excel("single")->orderBy(["id" => 'desc'])->select();
});

// 查询单条记录
$dzApi->get("/member/view", function($request){
    return excel("member")->where(["id"=>$request->get("id")])->find();
});
$dzApi->get("/single/view", function($request){
    return excel("single")->where(["id"=>$request->get("id")])->find();
});

// 新增记录
$dzApi->post("/member/add", function($request) {
    // 打开member.xlsx文件，将请求带来的数据保存到里面
   excel("member")->insert($request->all());
   // 响应结果
   return ["status" => "ok"];
});
$dzApi->post("/single/add", function($request) {
   excel("single")->insert($request->all());
   return ["status" => "ok"];
});

// 删除记录
$dzApi->get("/member/delete", function($id){
    // 删除编号为$id的记录
   excel("member")->where(["id"=>$id])->delete();
});

// 更新记录（http://xibang.test/api/index.php/member/edit）
$dzApi->post("/member/edit", function($request){
    // 更新指定编号的记录
    excel("member")
        ->where(["id"=>$request->get("id")])
        ->update($request->all());
});
$dzApi->post("/single/edit",function($request){
    execl("single")
    ->where(["id"=>$request->get("id")])
    ->update($request-all());
});



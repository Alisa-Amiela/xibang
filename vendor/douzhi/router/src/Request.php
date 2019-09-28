<?php

namespace Douzhi;


class Request
{
  public function get($key = null, $default = null)
  {
    if (is_null($key)) {
      return $_GET;
    } else {
      return isset($_GET[$key]) ? $_GET[$key] : $default;
    }
  }

  public function post($key = null, $default = null)
  {
    if (is_null($key)) {
      return $_POST;
    } else {
      return isset($_POST[$key]) ? $_POST[$key] : $default;
    }
  }

  public function all()
  {
    if(stripos($_SERVER['CONTENT_TYPE'], 'application/json') != -1){
      return json_decode(file_get_contents('php://input'), true);
    }else{
      return $_POST;
    }
  }
}
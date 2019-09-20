<?php

namespace Douzhi;

class Router
{
  private $dirname;
  private $basename;
  private $routes;

  public function __set($property_name, $value)
  {
    $this->$property_name = $value;
  }

  public function run()
  {
    $this->createHtaccess();
    $this->response();
  }

  public function response()
  {
    if (!isset($_SERVER['PATH_INFO'])) {
      return;
    }
    $closure = $this->routes[$_SERVER['REQUEST_METHOD'] . $_SERVER['PATH_INFO']];
    if ($closure instanceof \Closure) {
      $content = $closure->call(new Closure(), new Request());
      if (is_string($content)) {
        echo $content;
      } else if (is_array($content)) {
        echo json_encode($content);
      }
    }
  }

  public function createHtaccess()
  {
    $template = file_get_contents(dirname(__FILE__) . "/.htaccess");
    $template = str_replace("{{basename}}", $this->basename, $template);
    if (!file_exists("{$this->dirname}/.htaccess")) {
      file_put_contents("{$this->dirname}/.htaccess", $template);
    }
  }

  public function addRoute($method, $uri, $action)
  {
    $this->routes[$method . $uri] = $action;
  }

  public function get($uri, $action)
  {
    $this->addRoute("GET", $uri, $action);
  }

}
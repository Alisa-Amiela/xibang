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
    echo $this->getActionResult($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
  }

  public function getRoute($method, $uri)
  {
    return $this->routes[$method . $uri];
  }

  public function getActionResult($method, $uri)
  {
    $closure = $this->getRoute($method, $uri);

    if ($closure instanceof \Closure) {
      $parameters = [];
      $reflection = new \ReflectionFunction($closure);
      foreach ($reflection->getParameters() as $parameter) {
        $name = strtolower($parameter->name);
        if ($name === 'request') {
          array_push($parameters, new Request());
        }
        if (isset($_GET[$name])) {
          array_push($parameters, $_GET[$name]);
        }
        if (isset($_POST[$name])) {
          array_push($parameters, $_POST[$name]);
        }
      }
      $content = $closure->call(new Closure(), ...$parameters);
      if (is_string($content) || is_int($content)) {
        return $content;
      } else if (is_array($content)) {
        return json_encode($content);
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

  public function post($uri, $action)
  {
    $this->addRoute("POST", $uri, $action);
  }

}
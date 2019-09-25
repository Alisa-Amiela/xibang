<?php

use Douzhi\Router;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
  protected $dzApi;

  public function setUp(): void
  {
    $this->dzApi = new Router();
  }

  public function testPost()
  {
    $form_params = [
        'field_name' => 'abc',
        'other_field' => '123',
        'nested_field' => [
            'nested' => 'hello'
        ]
    ];
    $client = new Client();
    $response = $client->request('POST', 'http://localhost/router/example/index.php/foo', [
        'form_params' => $form_params
    ]);
    $this->assertEquals(json_encode($form_params), $response->getBody());
  }

  public function testGetString()
  {
    $this->dzApi->get("/foo", function () {
      return "foo";
    });
    $this->assertEquals("foo", $this->dzApi->getActionResult('GET', '/foo'));
  }

  public function testGetParameter()
  {
    $_GET['id'] = 1;
    $_GET['name'] = 'foo';
    $this->dzApi->get("/GetParameter", function ($id, $name) {
      return [
          $id,
          $name
      ];
    });
    $this->assertEquals(json_encode([
        $_GET['id'],
        $_GET['name']
    ]), $this->dzApi->getActionResult('GET', '/GetParameter'));
  }

  public function testGetJSON()
  {
    $this->dzApi->get("/foo", function () {
      return [
          "a",
          "b",
          "c"
      ];
    });
    $this->assertEquals(json_encode([
        "a",
        "b",
        "c"
    ]), $this->dzApi->getActionResult('GET', '/foo'));
  }

  public function testPostString()
  {
    $this->dzApi->post("/foo", function () {
      return "foo";
    });
    $this->assertEquals("foo", $this->dzApi->getActionResult('POST', '/foo'));
  }

  public function testPostJSON()
  {
    $this->dzApi->post("/foo", function () {
      return [
          "a",
          "b",
          "c"
      ];
    });
    $this->assertEquals(json_encode([
        "a",
        "b",
        "c"
    ]), $this->dzApi->getActionResult('POST', '/foo'));
  }

  //  public function testRequestAll()
  //  {
  //    $_GET = [];
  //    $_POST['id'] = 1;
  //    $this->dzApi->post("/all", function ($request) {
  //      return $request->all();
  //    });
  //    $this->assertEquals(json_encode($_POST), $this->dzApi->getActionResult('POST', '/all'));
  //  }
}
<?php

namespace Douzhi;

class MySQL
{
  private static $instance = null;
  private static $db = null;
  private $tableName;
  private $where;

  public function __construct($tableName)
  {
    $this->tableName = $tableName;
  }

  public static function connect($host, $username, $passwd, $dbname)
  {
    self::$db = new \mysqli($host, $username, $passwd, $dbname);
  }

  public static function table($tableName)
  {
    return new self($tableName);
  }

  public function select()
  {
    $sql = "SELECT * FROM {$this->tableName}";
    if (!empty($this->where)) {
      $sql .= " WHERE {$this->where}";
    }
    $result = self::$db->query($sql);
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

  public function find()
  {
    return current(self::$instance->select());
  }

  public function where($where)
  {
    $this->where = $where;
    return $this;
  }

  public function insert($data)
  {
    $fields = '`' . implode('`,`', array_keys($data)) . '`';
    $values = "'" . implode("','", array_values($data)) . "'";
    $sql = "INSERT INTO {$this->tableName} ({$fields}) VALUES ({$values})";
    self::$db->query($sql);
  }

  public function update($data)
  {
    array_walk($data, function (&$value, $key) {
      $value = "`{$key}`" . "='" . $value . "'";
    }, 'data');
    $data = implode(',', $data);
    $sql = "UPDATE {$this->tableName} SET {$data}";
    if (!empty($this->where)) {
      $sql .= " WHERE {$this->where}";
    }
    self::$db->query($sql);
  }

  public function delete()
  {
    $sql = "DELETE FROM {$this->tableName}";
    if (!empty($this->where)) {
      $sql .= " WHERE {$this->where}";
    }
    self::$db->query($sql);
  }
}
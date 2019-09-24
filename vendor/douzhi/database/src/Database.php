<?php

namespace Douzhi;

use MongoDB\BSON\ObjectId;

abstract class Database
{
  public $tableName;
  public $where;
  public $orderBy;

  public function __construct($tableName)
  {
    $this->tableName = $tableName;
  }

  public static function table(string $name): Object
  {
    return new static($name);
  }

  abstract public function find(): array;

  abstract public function where($where): Object;

  abstract public function insert(array $data): bool;

  abstract public function update(array $data): bool;

  abstract public function delete(): bool;

  abstract public function orderBy($orderBy): Object;
}
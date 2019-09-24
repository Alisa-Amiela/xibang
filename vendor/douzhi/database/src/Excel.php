<?php

namespace Douzhi;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Excel extends Database
{
  public $spreadsheet;
  public $worksheet;
  public $pk;
  public $auto_increment;
  public $fields;
  public $limit;

  public static function table(string $name): Object
  {
    $excel = parent::table($name);
    $excel->tableName = $name;
    $excel->spreadsheet = IOFactory::load("{$name}.xlsx");
    $excel->worksheet = $excel->spreadsheet->getSheet(0);
    $excel->getPk();
    $excel->getAutoIncrement();
    $excel->getFields();
    $excel->worksheet->setTitle('My Data');
    $excel->worksheet->setShowGridlines(false);
    $writer = IOFactory::createWriter($excel->spreadsheet, "Xlsx");
    $writer->save("{$name}.xlsx");
    return $excel;
  }

  public function getFields()
  {
    if (!$this->fields) {
      $this->select();
    }
    return $this->fields;
  }

  public function getPk()
  {
    if (!$this->pk) {

      $this->pk = $this->worksheet->getCell('A1')
                                  ->getValue();
      if (!$this->pk) {
        throw new \Exception('A1单元格不能为空');
      }
    }
    return $this->pk;
  }

  public function limit($num)
  {
    $this->limit = $num;
    return $this;
  }

  public function count()
  {
    return count($this->select());
  }

  public function getAutoIncrement()
  {
    if (!$this->auto_increment) {
      $records = $this->select();
      if (empty($records)) {
        $this->auto_increment = 1;
      } else {
        $ids = [];
        array_walk($records, function ($record) use (&$ids) {
          $ids[] = current($record);
        });
        $this->auto_increment = max($ids) + 1;
      }
    }
    return $this->auto_increment;
  }

  public function select(): array
  {
    $fields = [];
    $data = [];
    foreach ($this->worksheet->getRowIterator() as $rowKey => $row) {
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(false);
      $i = 0;
      foreach ($cellIterator as $key => $cell) {
        if ($rowKey == 1) {
          $cell->getCalculatedValue() && $fields[] = $cell->getCalculatedValue();
        } else if ($i < count($fields)) {
          $data[$rowKey][$fields[$i]] = ($i == 0 ? (int)$cell->getCalculatedValue() : $cell->getCalculatedValue());
          $i++;
        }
      }
    }
    $this->fields = $fields;
    $records = array_values($data);
    if ($this->where) {
      $records = array_filter($records, function ($record) {
        return $record[key($this->where)] == current($this->where);
      });
    }
    if ($this->limit) {
      $offset = isset($_GET['page']) ? ($_GET['page'] - 1) * $this->limit : 0;
      $records = array_slice($records, $offset, $this->limit);
    }
    if (!empty($this->orderBy)) {
      foreach ($this->orderBy as $key => $value) {
        usort($records, function ($a, $b) use ($key, $value) {
          $a = $a[$key];
          $b = $b[$key];
          if ($value == 'desc') {
            return ($a > $b) ? -1 : 1;
          } else if ($value == 'asc') {
            return ($a < $b) ? -1 : 1;
          }
          return 0;
        });
      }
    }
    return $records;
  }

  public function find(): array
  {
    if (empty($this->where)) {
      return [];
    }
    $data = $this->select();
    $data = array_filter($data, function ($record) {
      return $record[key($this->where)] == current($this->where);
    });
    return current($data);
  }

  public function where($where): Object
  {
    $this->where = $where;
    return $this;
  }

  public function orderBy($orderBy): Object
  {
    $this->orderBy = $orderBy;
    return $this;
  }

  public function insert(array $data): bool
  {
    if (empty($data)) {
      return false;
    }
    $data = array_merge([$this->getPk() => $this->getAutoIncrement()], $data);
    $records = $this->select();
    $newRecord = [];
    foreach ($this->getFields() as $field) {
      $newRecord[$field] = $data[$field] ?? null;
    }
    $records = array_merge([$this->getFields()], $records, [$newRecord]);
    array_walk($records, function (&$record) {
      $record = array_values($record);
    });
    $this->empty()
         ->fromArray($records, null, 'A1');
    $this->save();
    return true;
  }

  function empty()
  {
    $this->spreadsheet->removeSheetByIndex(0);
    $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($this->spreadsheet, 'My Data');
    $this->spreadsheet->addSheet($myWorkSheet, 0);
    $myWorkSheet->setShowGridlines(false);
    return $myWorkSheet;
  }

  public function toArray($records)
  {
    array_walk($records, function (&$record) {
      $record = array_values($record);
    });
    return array_merge([$this->getFields()], $records);
  }

  public function update(array $data): bool
  {
    if (empty($this->where)) {
      return false;
    }
    $where = $this->where;
    $this->where = [];
    $recordsA = $records = $this->select();
    array_walk($records, function (&$record) use ($data, $where) {
      foreach ($where as $key => $value) {
        if ($record[$key] != $value) {
          return false;
        }
      }
      $record = array_replace($record, $data);
    });
    if (serialize($recordsA) == serialize($records)) {
      return false;
    }
    $records = array_merge([$this->getFields()], $records);
    $this->empty()
         ->fromArray($records, null, 'A1');
    $this->save();
    return true;
  }

  public function delete(): bool
  {
    if (empty($this->where)) {
      return false;
    }
    $where = $this->where;
    $this->where = [];
    $records = $this->select();
    $countA = count($records);
    $records = array_filter($records, function ($record) use ($where) {
      $results = [];
      foreach ($where as $key => $value) {
        if ($record[$key] == $value) {
          $results[] = true;
        }
      }
      return array_sum($results) != count($where);
    });
    $countB = count($records);
    if ($countA == $countB) {
      return false;
    }
    $records = $this->toArray($records);
    $this->empty()
         ->fromArray($records, null, 'A1');
    $this->save();
    return true;
  }

  public function save()
  {
    $writer = IOFactory::createWriter($this->spreadsheet, "Xlsx");
    foreach (range('A', 'Z') as $word) {
      $this->spreadsheet->getSheet(0)
                        ->getColumnDimension($word)
                        ->setAutoSize(true);
    }
    $writer->save("{$this->tableName}.xlsx");
  }
}

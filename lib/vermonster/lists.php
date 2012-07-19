<?php

namespace Vermonster;

class Lists
{
  public $connection;

  public function __construct($connection)
  {
    $this->connection = $connection;
  }

  public function all()
  {
    return $this->connection->get("v1/lists");
  }
}
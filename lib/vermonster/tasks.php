<?php

class Vermonster_Tasks
{
  public static function find($id)
  {
    $response = Vermonster::connection()->get("v1/tasks/" . $id);
    return new Vermonster_Task($response["body"]);
  }
}

class Vermonster_Task
{
  public $info;

  public function __construct($json)
  {
    $this->info = $json;
  }
}
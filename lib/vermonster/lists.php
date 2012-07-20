<?php

class Vermonster_Lists
{
  public function all()
  {
    $response = Vermonster::connection()->get("v1/lists");
    $lists = array();
    foreach($response["body"] as $list)
    {
      $lists[] = new Vermonster_List($list);
    }
    return $lists;
  }

  public function find($id)
  {
    $response = Vermonster::connection()->get("v1/lists/" . $id);
    return new Vermonster_List($response["body"]);
  }
}

class Vermonster_List
{
  public $info;

  public function __construct($json)
  {
    $this->info = $json;
  }

  public function tasks()
  {
    $response = Vermonster::connection()->get("v1/lists/" . $this->info["id"] . "/tasks");
    $tasks = array();
    foreach($response["body"] as $task)
    {
      $tasks[] = new Vermonster_Task($task);
    }
    return $tasks;
  }
}
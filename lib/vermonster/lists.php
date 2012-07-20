<?php

class Vermonster_Lists
{
  public static function all()
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
    $reponse = Vermonster::connection()->get("v1/lists/" . $id);
    return new Vermonster_List($reponse["body"]);
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
    return $response["body"]; # Turn into Vermonster_Task object
  }
}
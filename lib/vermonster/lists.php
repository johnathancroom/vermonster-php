<?php

class Vermonster_Lists
{
  public static function all()
  {
    $response = Vermonster::connection()->get("v1/lists");
    return $response["body"];
  }
}
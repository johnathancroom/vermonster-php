<?php

class Vermonster_User
{
  public $info;

  public function __construct()
  {
    $response = Vermonster::connection()->get("v1/me");
    $this->info = $response["body"];
  }
}
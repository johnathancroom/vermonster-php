<?php

class Vermonster_Authentication
{
  public static function url()
  {
    return "https://api.cheddarapp.com/oauth/authorize?client_id=" . Vermonster::getClient("id");
  }

  public static function token($code)
  {
    $response = Vermonster::connection()->post("oauth/token", array("grant_type" => "authorization_code", "code" => $code));

    if($response["access_token"])
    {
      Vermonster::setClient(array("token" => $response["access_token"]));
      Vermonster::connect($response["access_token"]);
    }
  }
}
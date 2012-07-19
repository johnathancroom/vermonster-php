<?php

class Vermonster_Authentication
{
  function url()
  {
    return "https://api.cheddarapp.com/oauth/authorize?client_id=" . Vermonster::getClient("id");
  }

  function token($code)
  {
    $response = Vermonster::connection()->post("oauth/token", array("grant_type" => "authorization_code", "code" => $code));
    echo $response;
  }
}
<?php

class Vermonster_Authentication
{
  # Returns the URL for authorizing the user.
  public static function url()
  {
    return "https://api.cheddarapp.com/oauth/authorize?client_id=" . Vermonster::getClient("id");
  }

  # Get the token for the user
  public static function token($code)
  {
    $response = Vermonster::connection()->post("oauth/token", array("grant_type" => "authorization_code", "code" => $code));

    if(isset($response["body"]["access_token"]))
    {
      Vermonster::setClient(array("token" => $response["body"]["access_token"]));
      Vermonster::connect($response["body"]["access_token"]);

      return self::is_authorized();
    }
    else
    {
      return false;
    }
  }

  # Skip the code and just user developer's user access token
  public static function use_token($token)
  {
    Vermonster::setClient(array("token" => $token));
    Vermonster::connect($token);

    return self::is_authorized();
  }

  # Check if authorized
  public static function is_authorized()
  {
    $response = Vermonster::connection()->get("v1/me");
    if($response["headers"]["http_code"] == 200)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}
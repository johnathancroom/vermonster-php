<?php

class Vermonster_Connection
{
  public $token;

  public function __construct($token)
  {
    if($token)
    {
      $this->token = "Authorization: Bearer " . $token;
    }
  }

  public function get($path)
  {
    $url = "https://api.cheddarapp.com/" . $path;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($this->token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $data = curl_exec($ch);
    curl_close($ch);

    return json_decode($data, true);
  }

  public function post($path, $options = array())
  {
    $url = "https://api.cheddarapp.com/" . $path;

    //urlify the data for the POST
    $options_string = "";
    foreach($options as $key => $value)
    {
      $options_string .= $key . "=" . $value . "&";
    }
    rtrim($options_string, "&");

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, Vermonster::getClient("id") . ":" . Vermonster::getClient("secret"));
    curl_setopt($ch, CURLOPT_POST, count($options));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $options_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);

    return json_decode($data, true);
  }
}
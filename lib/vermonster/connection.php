<?php

class Vermonster_Connection
{
  public $token;

  # Initialize, with token header if available
  public function __construct($token)
  {
    if($token)
    {
      $this->token = "Authorization: Bearer " . $token;
    }
  }

  # Do a GET request
  public function get($path)
  {
    $url = "https://api.cheddarapp.com/" . $path;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($this->token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $data = curl_exec($ch);
    $headers = curl_getinfo($ch);
    curl_close($ch);

    return array("headers" => $headers, "body" => json_decode($data, true));
  }

  # Do a POST request
  public function post($path, $options = array())
  {
    $url = "https://api.cheddarapp.com/" . $path;

    # urlify the data for the POST
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
    $headers = curl_getinfo($ch);
    curl_close($ch);

    return array("headers" => $headers, "body" => json_decode($data, true));
  }
}
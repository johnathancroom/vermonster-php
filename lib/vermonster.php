<?php

if(!function_exists("curl_init"))
{
  throw new Exception("Vermonster needs the CURL PHP extension.");
}

if(!function_exists("json_decode"))
{
  throw new Exception("Vermonster needs the JSON PHP extension.");
}

class Vermonster
{
  public static $client,
                $connection;

  public function setApiKeys($options = array())
  {
    self::$client = $options;

    self::connect();
  }

  public function setClient($options = array())
  {
    foreach($options as $key => $value)
    {
      self::$client[$key] = $value;
    }
  }

  public function getClient($key)
  {
    return self::$client[$key];
  }

  public function connect($token = NULL)
  {
    self::$connection = new Vermonster_Connection($token);
  }

  public function connection()
  {
    return self::$connection;
  }
}

require(dirname(__FILE__) . "/vermonster/connection.php");
require(dirname(__FILE__) . "/vermonster/authentication.php");
require(dirname(__FILE__) . "/vermonster/lists.php");
/*require(dirname(__FILE__) . "/vermonster/tasks.php");
require(dirname(__FILE__) . "/vermonster/users.php");*/
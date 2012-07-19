<?php

if(!function_exists("curl_init"))
{
  throw new Exception("Vermonster needs the CURL PHP extension.");
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

  public function getClient($key)
  {
    return self::$client[$key];
  }

  public function connect($token = NULL)
  {
    self::$connection = new Vermonster_Connection;
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
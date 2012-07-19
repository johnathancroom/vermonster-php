<?php

namespace Vermonster;

if(!function_exists("curl_init"))
{
  throw new Exception("Vermonster needs the CURL PHP extension.");
}

class Client
{
  public $client,
         $connection,
         $lists;

  public function __construct($options = array())
  {
    $this->client = $options;

    $this->lists = new Lists;

    $this->connect();
  }

  public function connect($token = NULL)
  {
    $this->connection = new Connection;
  }
}

require(dirname(__FILE__) . "/vermonster/connection.php");
require(dirname(__FILE__) . "/vermonster/authentication.php");
require(dirname(__FILE__) . "/vermonster/lists.php");
require(dirname(__FILE__) . "/vermonster/tasks.php");
require(dirname(__FILE__) . "/vermonster/users.php");
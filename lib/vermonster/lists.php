<?php

class Vermonster_Lists
{
  public function all()
  {
    return Client::connection()->get("v1/lists");
  }
}
<?php

class Vermonster_Lists
{
  public static function all()
  {
    return Vermonster::connection()->get("v1/lists");
  }
}
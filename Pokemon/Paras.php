<?php
require_once("Pokemon.php");
class Paras extends Pokemon
{
  function __construct($name, $weight, $hp, $latitude, $longitude, $nickname)
  {
    parent::__construct($name, "paras.png", $weight, $hp, $latitude, $longitude, "bug", $nickname);
  }

  public function getDamage()
  {
    return $this->getWeight() * 0.8;  
  }
}

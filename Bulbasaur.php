<?php
require_once("Pokemon.php");
class Bulbasaur extends Pokemon
{
  public function __construct($name, $weight, $hp, $latitude, $longitude)
  {
    parent::__construct($name, "bulbasaur.png", $weight, $hp, $latitude, $longitude, "grass");
  }
  // public function attack()
  // {
  //   echo "<br>Bulbasaur Attacking!!";
  // }

  public function getDamage()
  {
    return 3;
  }
}
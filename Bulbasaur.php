<?php
require_once("Pokemon.php");
class Bulbasaur extends Pokemon
{
  public function __construct($name, $weight, $hp, $latitude, $longitude, $nickname)
  {
    parent::__construct($name, "bulbasaur.png", $weight, $hp, $latitude, $longitude, "grass", $nickname);
  }
  // public function attack()
  // {
  //   echo "<br>Bulbasaur Attacking!!";
  // }

  public function getDamage()
  {
    return $this->getWeight()*0.3;
  }
}

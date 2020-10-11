<?php
require_once("Pokemon.php");
class Pikachu extends Pokemon
{
  function __construct($name, $weight, $hp, $latitude, $longitude, $nickname)
  {
    parent::__construct($name, "pikachu.png", $weight, $hp, $latitude, $longitude, "electric", $nickname);
  }
  // public function attack()
  // {
  //   echo "<br>Pikachu Attacking!!";
  // }

  public function getDamage()
  {
    return $this->getWeight() * 1.5;  }
}

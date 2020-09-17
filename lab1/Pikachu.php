<?php
require_once("Pokemon.php");
class Pikachu extends Pokemon
{
  function __construct($name, $weight, $hp, $latitude, $longitude)
  {
    parent::__construct($name, "pikachu.png", $weight, $hp, $latitude, $longitude, "electric");
  }
  // public function attack()
  // {
  //   echo "<br>Pikachu Attacking!!";
  // }
}

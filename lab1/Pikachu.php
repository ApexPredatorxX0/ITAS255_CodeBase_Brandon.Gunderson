<?php
require_once("Pokemon.php");
class Pikachu extends Pokemon
{
  function __construct($weight, $hp, $latitude, $longitude)
  {
    parent::__construct("Pikachu", "pikachu.jpg", $weight, $hp, $latitude, $longitude, "pikachu");
  }
  public function attack()
  {
    echo "Pikachu Attacking!!";
  }
}

<?php
require_once("Pokemon.php");
class Bulbasaur extends Pokemon
{
  public function __construct($weight, $hp, $latitude, $longitude)
  {
    parent::__construct("Bulbasaur", "bulbasaur.jpg", $weight, $hp, $latitude, $longitude, "grass");
  }
  public function attack()
  {
    echo "Bulbasaur Attacking!!";
  }
}

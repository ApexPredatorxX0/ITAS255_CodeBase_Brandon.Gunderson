<?php
require_once("Pokemon.php");
class Bulbasaur extends Pokemon
{
  public function __construct($weight, $hp, $latitude, $longitude)
  {
    $this->weight = $weight;
    $this->hp = $hp;
    $this->latitude = $latitude;
    $this->longitude = $longitude;
    parent::__construct("Bulbasaur", "bulbasaur.jpg", $weight, $hp, $latitude, $longitude, "grass");
  }
  public function attack()
  {
    echo "Bulbasaur Attacking!!";
  }
  
}
$Steve = new Bulbasaur(34, 69, 12.5, 54.23);

$Steve->__toString();
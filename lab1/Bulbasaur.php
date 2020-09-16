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
    parent::__construct("Bulbasaur", "bulbasaur.png", $weight, $hp, $latitude, $longitude, "grass");
  }
  public function attack()
  {
    echo "<br>Bulbasaur Attacking!!";
  }
  
}
$Steve = new Bulbasaur(34, 69, 12.5, 54.23);

//$Steve->__toString();

////echo $Steve;

//$Steve->getName();
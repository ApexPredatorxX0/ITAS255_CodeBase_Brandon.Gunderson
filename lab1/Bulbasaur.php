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
  
}
$Steve = new Bulbasaur("Jack", 34, 69, 12.5, 54.23);

//$Steve->__toString();

////echo $Steve;

//$Steve->getName();
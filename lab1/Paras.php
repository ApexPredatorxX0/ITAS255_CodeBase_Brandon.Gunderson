<?php
require_once("Pokemon.php");
class Paras extends Pokemon
{
  function __construct($weight, $hp, $latitude, $longitude)
  {
    parent::__construct("Paras", "paras.png", $weight, $hp, $latitude, $longitude, "bug");
  }
  public function attack()
  {
    echo "<br>Paras Attacking!!";
  }
}

<?php
require_once("Pokemon.php");
class Bulbasaur {
  public function __construct()
  {
    function __construct($weight, $hp, $latitude, $longitude)
    {
      parent::__construct("Bulbasaur", "bulbasaur.jpg", $weight, $hp, $latitude, $longitude, "grass");
    }
  }
  public function Attack() {
    echo "Bulbasaur Attacking!!";
  }
}
?>
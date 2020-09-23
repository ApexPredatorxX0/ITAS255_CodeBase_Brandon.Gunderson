<?php
//require_once("Pokemon.php");
class Trainer extends Character
{
  public $pokedex;

  public function __construct($name, $image, $latitude, $longitude)
  {
    $this->name = $name;
    $this->image = $image;
    $this->latitude = $latitude;
    $this->longitude = $longitude;
    //$this->pokedex = $pokedex;
    $this->pokedex = array();
  }

  public function add(Pokemon $pokemon)
  {
    $this->pokedex[] = $pokemon;
  }

  public function printAll()
  {
    echo "<br><table border='1'>";
    echo "<tr><td>Name</td><td>Image</td><td>Weight</td><td>HP</td><td>Latitude</td><td>Longitude</td><td>Type</td><td>Speed</td><td>Is Flying</td><td>Direction</td></tr>";
    //$this->pokedex = $pokedex;
    foreach ($this->pokedex as $pokemon) {
      echo $pokemon;
    }

    echo "</table>";
  }

  public function __toString()
  {
    return "<table><tr><td>Name</td><td>Image</td></tr><tr><td>" . $this->name . "</td><td><img src='images/" . $this->image . "' width='50'</td></tr></table>";
  }

  public function attackAll(Pokemon $other)
  {
    echo "All pokemon are attacking " . $other->name . "!!<br>";
    foreach ($this->pokedex as $pokemon) {
      $pokemon->attack($other);
    }
  }

  public function getDamage()
  {
    return 6;
  }
}

//$ash = new Trainer("Steve");

//echo $ash;

//$ash->printAll($pokedex);
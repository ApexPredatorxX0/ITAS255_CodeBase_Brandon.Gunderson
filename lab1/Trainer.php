<?php
require_once("Pokemon.php");
class Trainer extends Pokemon {
  private $pokedex;

  public function __construct($name, $image)
  {
    $this->name = $name;
    $this->image = $image;
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
    echo "<tr><td>Name</td><td>Image</td><td>Weight</td><td>HP</td><td>Latitude</td><td>Longitude</td><td>Type</td></tr>";
    //$this->pokedex = $pokedex;
    foreach ($this->pokedex as $pokemon) {
      echo $pokemon;
    }

    echo "</table>";
  }

  public function __toString()
  {
    return "<br>Name: " . $this->name . ", Image: <img src='images/" . $this->image . "' width='50'><br>";
  }

  public function attackAll() {
    foreach ($this->pokedex as $pokemon) {
      $pokemon->attack();
    }
  }
}

//$ash = new Trainer("Steve");

//echo $ash;

//$ash->printAll($pokedex);
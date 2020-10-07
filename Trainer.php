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
    echo "<br><table id=pokemon border='1'>";
    echo "<tr><th>Name</th><th>Image</th><th>Weight</th><th>HP</th><th>Latitude</th><th>Longitude</th><th>Type</th>";
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

  public function getJSON()
  {
      $tpoke = array();
    $tpoke = '{' . '"lat"' . ': ' . $this->lat . ',' . '"long"' . ': ' . $this->long . ',' . '"name"' . ': ' . '"' . $this->name . '"' . ',' . '"image"' . ': ' . '"' . $this->image . '"' . '}';

    return $tpoke;
  }
}

//$ash = new Trainer("Steve");

//echo $ash;

//$ash->printAll($pokedex);
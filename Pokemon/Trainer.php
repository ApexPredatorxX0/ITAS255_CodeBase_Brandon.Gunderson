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

  public function getName()
  {
    return $this->name;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }


  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }

  //adds pokemon to the $pokedex array
  public function add(Pokemon $pokemon)
  {
    $this->pokedex[] = $pokemon;
  }

  //prints out the current pokemon for Trainer.
  public function getPokemon()
  {
    return $this->pokedex;
  }

  //prints out a table data and calls each pokemon to echo themselves.
  public function printAll()
  {
    $traineys = "<br><h2>Trainer " . $this->name . "'s Pokemon</h2>";
    $traineys .= "<br><table id=pokemon border='1'>";
    $traineys .= "<tr><th>Name</th><th>Image</th><th>Weight</th><th>HP</th><th>Latitude</th><th>Longitude</th><th>Type</th></tr>";
    
    foreach ($this->pokedex as $pokemon) {
      $traineys .= $pokemon;
    }

    $traineys .= "</table>";
    return $traineys;
  }

  public function __toString()
  {
    return "<table><tr><th>Name</th><th>Image</th><th>Lat</th><th>Long</th></tr><tr><td>" . $this->name . "</td><td><img src='images/" . $this->image . "' width='50'></td><td>" . $this->latitude . "</td><td>" . $this->longitude . "</td></tr></table>";
  }

  //loops through all the trainers pokemon in $pokedex and runs attack() against the target Pokemon $other.
  public function attackAll(Pokemon $other)
  {
    echo "All pokemon are attacking " . $other->name . "!!<br>";
    foreach ($this->pokedex as $pokemon) {
      $pokemon->attack($other);
    }
  }

  //prints out the formatted data for when JSON is needed for Trainer.
  public function getJSON()
  {
    $tpoke = array();
    $tpoke = '{' . '"lat"' . ': ' . $this->latitude . ',' . '"long"' . ': ' . $this->longitude . ',' . '"name"' . ': ' . '"' . $this->name . '"' . ',' . '"image"' . ': ' . '"' . $this->image . '"' . '}';

    return $tpoke;
  }
}
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

  public function add(Pokemon $pokemon)
  {
    $this->pokedex[] = $pokemon;
  }

  public function getPokemon()
  {
    return $this->pokedex;
  }
  public function printAll()
  {
    $traineys = "<br>Trainer " . $this->name . "'s Pokemon";
    $traineys .= "<br><table id=pokemon border='1'>";
    $traineys .= "<tr><th>Name</th><th>Image</th><th>Weight</th><th>HP</th><th>Latitude</th><th>Longitude</th><th>Type</th></tr>";
    //$this->pokedex = $pokedex;
      foreach ($this->pokedex as $pokemon) {
      $traineys .= $pokemon;
    }
    /*    for ($i = 0; $i < count($this->pokedex); $i++) {
      echo "Count is: " . $i;
      echo $this->pokedex[$i];
    } */
    //<td>" . current($this->pokedex) . "</td>" .
    $traineys .= "</table>";
    return $traineys;
  }

  public function __toString()
  {
    return "<table><tr><th>Name</th><th>Image</th><th>Lat</th><th>Long</th></tr><tr><td>" . $this->name . "</td><td><img src='images/" . $this->image . "' width='50'></td><td>" . $this->latitude . "</td><td>" . $this->longitude . "</td></tr></table>";
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
    $tpoke = '{' . '"lat"' . ': ' . $this->latitude . ',' . '"long"' . ': ' . $this->longitude . ',' . '"name"' . ': ' . '"' . $this->name . '"' . ',' . '"image"' . ': ' . '"' . $this->image . '"' . '}';

    return $tpoke;
  }
}

//$ash = new Trainer("Steve");

//echo $ash;

//$ash->printAll($pokedex);
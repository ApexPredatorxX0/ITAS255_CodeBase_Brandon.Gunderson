<?php
require_once("Pokemon.php");
class Trainer extends Pokemon {
  private $pokedex;

  public function __construct($name)
  {
    $this->name = $name;
    //$this->pokedex = $pokedex;
    $this->pokedex = array();
  }
  
  public function add(Pokemon $pokemon)
  {
    $this->pokedex[] = $pokemon;
  }

  public function printAll()
  {
    //$this->pokedex = $pokedex;
    foreach ($this->pokedex as $pokemon) {
      echo "<br>" . $pokemon;
    }
  }

  public function __toString()
  {
    return "<br>Name: " . $this->name . ".";
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
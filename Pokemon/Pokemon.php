<?php
abstract class Pokemon extends Character
{

  //variable declaration
  private $weight;
  private $hp;
  private $type;
  private $nickname;

  //get functions
  public function getName()
  {
    return $this->name;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function getWeight()
  {
    return $this->weight;
  }
  public function getHp()
  {
    return $this->hp;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
  public function getType()
  {
    return $this->type;
  }
  public function getNickname() {
    return $this->nickname;
  }

  //set functions
  public function setHp($hp) {
    $this->hp = $hp;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }


  //__construct function
  public function __construct($name, $image, $weight, $hp, $latitude, $longitude, $type, $nickname)
  {  
     if ($nickname == NULL) {
      $nickname = $name;
    }
    $this->name = $name;
    $this->image = $image;
    $this->weight = $weight;
    $this->hp = $hp;
    $this->latitude = $latitude;
    $this->longitude = $longitude;
    $this->type = $type;
    $this->nickname = $nickname;

 
  }


  //toString function
  public function __toString()
  {
    return "<tr><td>" . $this->nickname . "</td><td><img src='images/" . $this->image . "' width='50'></td><td>" . $this->weight . "</td><td>" . $this->hp . "</td><td>" . $this->latitude . "</td><td>" . $this->longitude . "</td><td>" . $this->type . "</td></tr>";
  }

  //attack function
  public function Attack(Pokemon $other)
  {

    $other->hp = $other->hp - $this->getDamage();

    if ($other->hp <= 0) {
      $other->setHp(0);
    }

    return $this->nickname . " attacked " . $other->nickname . " doing " . $this->getDamage() . " damage!! " . $other->nickname . "'s HP is now only " . $other->hp;
  }

  //adds the requirement that all pokemonhave a getDamage() function in their respective classes.
  public abstract function getDamage();

  //returns the data needed for JSON loading for pokemon when called.
  public function getJSON()
  {
    $tpoke = '{' . '"lat"' . ': ' . $this->latitude . ',' . '"long"' . ': ' . $this->longitude . ',' . '"name"' . ': ' . '"' . $this->nickname . '"' . ',' . '"image"' . ': ' . '"' . $this->image . '"' . '}';

    return $tpoke;
  }
}

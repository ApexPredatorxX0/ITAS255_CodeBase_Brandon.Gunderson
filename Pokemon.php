<?php
abstract class Pokemon extends Character
{

  //variable declaration
  //private $name;
  //private $image;
  private $weight;
  private $hp;
  //private $latitude;
  //private $longitude;
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

    return $this->nickname . " attacked " . $other->nickname . " doing " . $this->getDamage() . " damage!!";

    return " " . $other->nickname . "'s HP is now only " . $other->hp;
  }

  public abstract function getDamage();

  public function getJSON()
  {
    //$tpoke = array();
    $tpoke = '{' . '"lat"' . ': ' . $this->latitude . ',' . '"long"' . ': ' . $this->longitude . ',' . '"name"' . ': ' . '"' . $this->name . '"' . ',' . '"image"' . ': ' . '"' . $this->image . '"' . '}';

    return $tpoke;
  }
}

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

  //set functions
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }


  //__construct function
  public function __construct($name, $image, $weight, $hp, $latitude, $longitude, $type)
  {
    $this->name = $name;
    $this->image = $image;
    $this->weight = $weight;
    $this->hp = $hp;
    $this->latitude = $latitude;
    $this->longitude = $longitude;
    $this->type = $type;
  }


  //toString function
  public function __toString()
  {
    return "<tr><td>" . $this->name . "</td><td><img src='images/" . $this->image . "' width='50'></td><td>" . $this->weight . "</td><td>" . $this->hp . "</td><td>" . $this->latitude . "</td><td>" . $this->longitude . "</td><td>" . $this->type . "</td><td>" . $this->speed . "</td><td>" . $this->isFlying . "</td><td>" . $this->direction . "</td>";
  }

  //attack function
  public function Attack(Pokemon $other)
  {


    $other->hp = $other->hp - $this->getDamage();

    echo "<br>" . $this->name . " attacked " . $other->name . "!!";

    echo " " . $other->name . "'s HP is now only " . $other->hp;
  }

  public abstract function getDamage();

  public function getJSON()
  {
    //$tpoke = array();
    $tpoke = '{' . '"lat"' . ': ' . $this->latitude . ',' . '"long"' . ': ' . $this->longitude . ',' . '"name"' . ': ' . '"' . $this->name . '"' . ',' . '"image"' . ': ' . '"' . $this->image . '"' . '}';

    return $tpoke;
  }
}

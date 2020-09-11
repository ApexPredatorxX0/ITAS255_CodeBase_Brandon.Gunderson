<?php
class Pokemon {

  //variable declaration
  private $name;
  private $image;
  private $weight;
  private $hp;
  private $latitude;
  private $longitude;
  private $type;

  //get functions
  public function getName() {
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
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }
  public function setLongitude($longitude) {
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
  public function __toString() {
    echo "Name: " . $name . ", Image: " . $image . ", Weight: " . $weight . ", HP: " . $hp . ", Latitude: " . $latitude . ", Longitude: " . $longitude . ", Type: " . $type . ".";
  }

  //attack function
  public function Attack() {
    echo "Base class, no attack";
  }
}
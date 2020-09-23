<?php
class Pidgey extends Pokemon implements Flyer {
  private $speed;
  private $isFlying;
  private $direction;

  public function __construct($name, $weight, $hp, $latitude, $longitude, $speed, $isFlying, $direction)
  {
    parent::__construct($name, "pidgey.png", $weight, $hp, $latitude, $longitude, "flying");
    $this->speed = $speed;
    $this->isFlying = $isFlying;
    $this->direction = $direction;
  }

  public function getDamage()
  {
    return 3;
  }

  public function takeoff()
  {
    $this->isFlying = true;
  }

  public function land()
  {
    $this->isFlying = false;
  }

  public function getFlying()
  {
    return $this->isFlying;
  }

  function getSpeed()
  {
    return $this->speed;
  }

  function getDirection()
  {
    return $this->direction;
  }

}




?>
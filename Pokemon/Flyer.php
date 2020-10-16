<?php

//interface implemented into pidgey.php.
interface Flyer
{
  function takeoff();

  function land();

  function getFlying();

  function getSpeed();

  function getDirection();
}

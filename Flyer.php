<?php
interface Flyer
{
  function takeoff();

  function land();

  function getFlying(); // return true or false if flying

  function getSpeed();

  function getDirection();
}

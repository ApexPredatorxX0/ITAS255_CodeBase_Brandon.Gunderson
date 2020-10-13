<?php
session_start();
?>

<head>
	<title>PHPmon</title>

	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">

	<style>
		body {
			background-image: url('images/background.png');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
		}

		table#pokemon td {
			border: 1px solid black;
			padding: 5px;
		}

		#pokemon {
			border: 1px solid black;
		}

		table#pokemon td:empty {
			border: 0px;
		}
	</style>
</head>

<body>

	<?php

	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	// Simple test script to test loading pokemon from files and 
	// the getJSON() function
	// croftd: modified to loop through and test the battle function
	// 
	function __autoload($class_name)
	{
		require_once $class_name . '.php';
	}

	/*

	/*
$classes = get_declared_classes();
echo "<br>";
foreach($classes as $class) {
  echo "<br>" . $class;
}
*/

	/* $world = World::getInstance();

	echo "<br>Loading pokemon from the two text files...";


	$loadedPokemon = $world->load(); */
	$ash = new Trainer("Ash", "trainer.png", 144.34, 54.76);
	//$i = 0;
	/*
echo "<br>Starting looping through to test the world battle function!<br>";
for ($i=0; $i < 10; $i++) {

	echo "<br>Round[" . $i . "] Here is the current JSON:<br>";
	echo "<pre>";
	echo $world->getJSON();
	echo "</pre>";

	echo "<br>Round[" . $i . "] battle()";
	$world->battle();
	echo "<br>Round[" . $i . "]  messages from the world: " . $world->getMessage();
	$world->clearMessage();
}
*/


	//$ash = new Trainer("Ash", "trainer.png", 144.34, 54.76);

	echo $ash;

	//$Steve = new Bulbasaur("Steve", 34, 69, 12.5, 54.23);
	//$Steve2 = new Bulbasaur("Jerry", 34, 69, 12.5, 54.23);
	//$Steve3 = new Bulbasaur("Samantha", 34, 69, 12.5, 54.23);
	//$Bob = new Pikachu("Spike", 12, 45, 12.4, 345.2);
	$George = new Paras("Paras", 45, 23, 123, 234, "Tommy");
	$George2 = new Paras("Paras", 45, 23, 123, 234, "Smoz");
	$George3 = new Paras("Paras", 45, 23, 123, 234, "Kerry");
	$Pidgey1 = new Pidgey("Pidgey", 33, 13, 342, 343, "Johnny");



	//$ash->add($Steve);
	//$ash->add($Steve2);
	//$ash->add($Steve3);
	//$ash->add($Bob);
	$ash->add($George);
	$ash->add($George2);
	$ash->add($George3);
	$ash->add($Pidgey1);


	$ash->printAll($pokedex);

	echo "<br>";

	$ash->attackAll($George3);




	//$pidgey = new Pidgey("Johnny", 43, 34, 12, 33, 4, false, 45);
	//$world->load();
	/*
$classes = get_declared_classes();
echo "<br>";
foreach($classes as $class) {
  echo "<br>" . $class;
}
*/

	echo "<br>";
	$world = World::getInstance();
	echo "<br>";
	$world->load(); // load the wild and trainer pokemon
	echo "<br>";
	$json = $world->getJSON();
	echo "$json";

	//require_once "map.php";
	$trainer = $world->getTrainer();
	echo $trainer;
	$trainer->printAll($pokedex);

	$world->getWildPokemon();

	//$world->battle();
	//$world->battle();
require_once("map.php");
	echo "<hr>";
/* 	for ($i; $i < 10; $i++) {
		//echo "<hr>";
		//echo "<br><br><b>Battle Round: " . $i . "</b>";
		$world->battle();
		//echo $trainer;
		$trainer->printAll($pokedex);

		$world->getWildPokemon();
		echo "<hr>";
	} */
	echo $trainer;

	//echo "Test";

	
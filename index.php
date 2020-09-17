<?php
session_start();
?>

<head>
	<title>PHPmon</title>

	<style>
		body {
			background-image: url('images/background.png');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
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
$world = World::getInstance();

echo "<br>Loading pokemon from the two text files...";

$loadedPokemon = $world->load();

$i = 0;

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

	$ash = new Trainer("Ash", "trainer.png");

	echo $ash;

	$Steve = new Bulbasaur("Steve", 34, 69, 12.5, 54.23);
	$Steve2 = new Bulbasaur("Jerry", 34, 69, 12.5, 54.23);
	$Steve3 = new Bulbasaur("Samantha", 34, 69, 12.5, 54.23);
	$Bob = new Pikachu("Spike", 12, 45, 12.4, 345.2);
	$George = new Paras("Tommy", 45, 23, 123, 234);
	$George2 = new Paras("Smoz", 45, 23, 123, 234);
	$George3 = new Paras("Kerry", 45, 23, 123, 234);



	$ash->add($Steve);
	$ash->add($Steve2);
	$ash->add($Steve3);
	$ash->add($Bob);
	$ash->add($George);
	$ash->add($George2);
	$ash->add($George3);


	$ash->printAll($pokedex);

	echo "<br>";

	$ash->attackAll($pokedex);

/*
$classes = get_declared_classes();
echo "<br>";
foreach($classes as $class) {
  echo "<br>" . $class;
}
*/
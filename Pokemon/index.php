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

	echo "<br>";
	$world = World::getInstance();
	echo "<br>";
	$world->load(); // load the wild and trainer pokemon
	echo "<br>";
	$json = $world->getJSON();
	//echo $json;

	//require_once "map.php";
	$trainer = $world->getTrainer();
	echo $trainer;
	$trainer->printAll($pokedex);

	$world->getWildPokemon();

	//$world->battle();
	//$world->battle();
	require_once("map.php");
	echo "<hr>";
	for ($i; $i < 10; $i++) {

		$world->battle();

		echo $world->getMessage();
		$world->clearMessage();
		$trainer->printAll($pokedex);

		$world->getWildPokemon();
		echo "<hr>";
	}
	echo $trainer;

	//echo "Test";

<?php
session_start();
?>

<head>
	<title>PHPmon</title>

	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">

	<style>
		body {
			background-image: url('images/background-alt.png');
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

		h2 {
			margin: 0;
		}

		.header {
			display: flex;
			justify-content: center;
			text-decoration: underline;
		}

		.battle-logs {
			background-color: rgba(255, 255, 255, 0.9);
			padding: 3%;
			padding-top: 0;
			
		}
	</style>
</head>

<body>

	<?php

	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	function __autoload($class_name)
	{
		require_once $class_name . '.php';
	}

	$world = World::getInstance();
	$world->load(); // load the wild and trainer pokemon
	$json = $world->getJSON();

	echo "<div class='header'><h1> PHPMon </h1></div>";

	//creates Trainer object
	$trainer = $world->getTrainer();

	//Loads the mpa manually since __autoload has no tags to open this file
	require_once("map.php");


	//the main bulk of my index.php. This section handles the log generation that copies map.php's output.
	echo "<hr>";
	echo "<div class='battle-logs'>";	
	echo "<div id='battlelog' id='BattleHeader'><h1 class='header'> Battle Logs </h1></div>";
	for ($i; $i < 10; $i++) {

		//calls the battle function from world
		$world->battle();

		//prints out the message from battle and clears it for next round
		echo $world->getMessage();
		$world->clearMessage();

		//prints the current status of each of the trainers pokemon
		echo $trainer->printAll();

		//prints the current status of each of the wild pokemon
		echo $world->getWildPokemon();
		echo "<hr>";
	}
		echo "</div>";
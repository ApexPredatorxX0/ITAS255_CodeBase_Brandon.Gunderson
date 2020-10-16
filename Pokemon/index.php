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

	// Simple test script to test loading pokemon from files and 
	// the getJSON() function
	// croftd: modified to loop through and test the battle function
	// 
	function __autoload($class_name)
	{
		require_once $class_name . '.php';
	}

	$world = World::getInstance();
	$world->load(); // load the wild and trainer pokemon
	$json = $world->getJSON();
	//echo $json;

	echo "<div class='header'><h1> PHPMon </h1></div>";
	//require_once "map.php";
	$trainer = $world->getTrainer();

	//$world->battle();
	//$world->battle();
	require_once("map.php");
	echo "<hr>";
		echo "<div class='battle-logs'>";	
	echo "<div id='battlelog' id='BattleHeader'><h1 class='header'> Battle Logs </h1></div>";
	for ($i; $i < 10; $i++) {




		$world->battle();

		echo $world->getMessage();
		$world->clearMessage();
		echo $trainer->printAll();

		echo $world->getWildPokemon();
		echo "<hr>";

	}
		echo "</div>";

	//echo "Test";

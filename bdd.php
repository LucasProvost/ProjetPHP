<!DOCTYPE html>
<html>
<head>
	<link href="assets/style.css" rel="stylesheet">
</head>

	<?php
	require 'class/factory.php';
	require 'class/functions.php';
	require 'class/databaseconnection.php';
	?>

<nav>
		<a href="index.php">Accueil</a>
  		<a href="exercices.php">Exercices</a>
 	 	<a href="bdd.php">BDD</a>
 	 	<a href="laposte.php">La Poste</a>
	</nav>

<body>
	<h3>Story 3 : Nombres entiers jusqu'à N</h3>
	<form method="post">

	<?php

	$factory = new factory();
	$functions = new functions();

	$factory->createInputText("first_name", "Prénom");
	$factory->createInputText("last_name", "Nom");

	$arrayylmao = array("man","woman");
	$factory->createInputCombo("gender","Sexe",$arrayylmao);
	$factory->createInputText("email", "Mail");

	$factory->createInputText("address", "Adresse");
	$factory->createInputDate("birth_date", "Date de naissance");

	$factory->createSubmitButton();
	if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["gender"]) && !empty($_POST["email"]) && !empty($_POST["address"]) && !empty($_POST["birth_date"]) ){
		$request = "INSERT INTO contacts VALUES
		(
			'".$_POST["last_name"]."' , 
			'".$_POST["first_name"]."' ,
			'".$_POST["birth_date"]."' ,
			'".$_POST["gender"]."' ,
			'".$_POST["email"]."' ,
			'".$_POST["address"]."' 
		)";

		PDO::query($request) or die(PDO::errorInfo());
	}


	?>

	</form>

</body>
<footer>
		<p>Copyright 2020</p>
	</footer>
</html>
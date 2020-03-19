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

	$factory->createInputText("prime_numbers", "Entrez un nombre");
	$factory->createSubmitButton();

	if (!empty($_POST["prime_numbers"])) {
		foreach ($functions->getPrimeNumbers($_POST["prime_numbers"]) as $result) {
			echo $result . ' 	';
		}
	}

	?>

	</form>

	<hr>
	<h3>Story 4 : Retour dans le passé</h3>
	<form method="post">

	<?php

	$factory->createInputText("backInSeconds", "Entrez un nombre de secondes");
	$factory->createSubmitButton();
	if (!empty($_POST["backInSeconds"])) {
		echo "L'évenement a eu lieu le : " . $functions->goBackInTime($_POST["backInSeconds"]);
	}

	?>

	</form>
	
	<hr>
	<h3>Story 5 : Quel est le plus petit nombre ?</h3>
	<form method="post">

	<?php

	$factory->createInputText("first_number", "Premier nombre");
	$factory->createInputText("second_number", "Deuxième nombre");
	$factory->createInputText("third_number", "Troisième nombre");
	$factory->createSubmitButton();

	if (!empty($_POST["first_number"]) && !empty($_POST["second_number"]) && !empty($_POST["third_number"])) {
		echo "Le plus petit nombre est : " . $functions->getLowestNumber($_POST["first_number"], $_POST["second_number"], $_POST["third_number"]);
	}
	?>

	</form>

	<hr>
	<div>
	<?php

	$database = new databaseconnection("mysql", "semainephp", "127.0.0.1", "guillaume", "coding");
	foreach ($database->getAllRows("dinosaurs", "name") as $result) {
		echo $result . "</br>";
	}

	?>
	</div>

</body>

<footer>
	<p>Copyright 2020</p>
</footer>

</html>
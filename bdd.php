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
	<h3>Story 12 : Créez un contact</h3>

	<?php

	$factory = new factory();
	$functions = new functions();

	$database = new databaseconnection("mysql", "semainephp", "127.0.0.1", "guillaume", "coding");

	?>

	<form method="post">

	<?php

	$requestNames = "SELECT last_name, first_name FROM contacts";
	$contactsListArray = array();

	foreach ($result = $database->_database->query($requestNames) as $data) {
		array_push($contactsListArray, $data['last_name'] . ' ' . $data['first_name']);
	}

	var_dump($contactsListArray);

	$factory->createInputCombo("contacts_list", "Liste des contacts", $contactsListArray);

	$factory->createSubmitButton();

	?>

	</form>

	<form method="post">
	
	<?php

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
			'',
			'".$_POST["last_name"]."' , 
			'".$_POST["first_name"]."' ,
			'".$_POST["birth_date"]."' ,
			'".$_POST["gender"]."' ,
			'".$_POST["email"]."' ,
			'".$_POST["address"]."' 
		)";

		$database->_database->exec($request);
	}


	?>

	</form>

	<hr>
	<h3>Story 13 : Voir les contacts</h3>
	<form method="post">

	<?php

	$columnRequest = "SELECT COLUMN_NAME
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME = N'contacts'";

	$columnNames = array();

	$request = "SELECT * FROM contacts";

	foreach ($result = $database->_database->query($columnRequest) as $data) {
		array_push($columnNames, $data['COLUMN_NAME']);
	}

	echo '<table class="centerColumn">';
	echo "<tr>";
	foreach ($columnNames as $newColumn) {
		echo "<th>".$newColumn."</th>";
	}
	echo "</tr>";

	$switchBackground = true;
	$colorClass;

	foreach ($result = $database->_database->query($request) as $data) {
		
		if ($switchBackground) {
			$switchBackground = false;
			$colorClass = "darkBg";
		}
		else {
			$switchBackground = true;
			$colorClass = "whiteBg";
		}

		echo '<tr class="'. $colorClass . '"</tr>';
		foreach ($columnNames as $column) {
			echo "<td>".$data[$column]."</td>";
		}
		echo "</tr>";
	}

	echo "</tr>";
	echo "</table>";

	?>

	</form>

</body>
<footer>
		<p>Copyright 2020</p>
	</footer>
</html>
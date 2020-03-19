<?php include_once 'header.php';?>

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

	<?php include_once 'footer.php';?>
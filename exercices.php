<?php include_once 'header.php';?>

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

	<h3>Story 6 : Nombre en chiffres romains</h3>
	<form method="post">

	<?php

	$factory->createInputText("romanNumber", "Entrez un nombre entre 1 et 9999");
	$factory->createSubmitButton();

	if (!empty($_POST["romanNumber"])) {
		echo $functions->getRomanNumber($_POST["romanNumber"]);
	}

	?>

	</form>

	<hr>
	<h3>Story 7 : Factorielle d'un nombre</h3>
	<form method="post">

	<?php

	$factory->createInputText("factorialNumber", "Entrez un nombre");
	$factory->createSubmitButton();

	if (!empty($_POST["factorialNumber"])) {
		echo $functions->getFactorial($_POST["factorialNumber"]);
	}

	?>

	</form>

	<hr>
	<h3>Story 8 : Décimale d'un nombre</h3>
	<form method="post">

	<?php

	$factory->createInputText("decimalNumber", "Entrez un nombre");
	$factory->createSubmitButton();

	if (!empty($_POST["decimalNumber"])) {
		echo $functions->getDecimal($_POST["decimalNumber"]);
	}

	?>

	</form>

	<hr>
	<h3>Story 9 : Binaire d'un nombre</h3>
	<form method="post">

	<?php

	$factory->createInputText("binaryNumber", "Entrez un nombre");
	$factory->createSubmitButton();

	if (!empty($_POST["binaryNumber"])) {
		echo $functions->getBinary($_POST["binaryNumber"]);
	}

	?>

	</form>

	<hr>
	<h3>Story 10 : Vérification email/date</h3>
	<form method="post">

	<?php

	$factory->createInputText("checkMailInput", "Entrez une adresse email");
	$factory->createInputDate("checkDateInput", "Choisissez une date");
	$factory->createSubmitButton();

	if (!empty($_POST["checkMailInput"]) && !empty($_POST["checkDateInput"])) {
		if (filter_var($_POST["checkMailInput"], FILTER_VALIDATE_EMAIL)) {
			echo "L'adresse email " . $_POST["checkMailInput"] . " est valide.";
		}
		else {
			echo "L'adresse email " . $_POST["checkMailInput"] . " n'est  pas valide.";
		}

		echo "</br>";

		$dateFormat = DateTime::createFromFormat('d-m-Y', $_POST["checkDateInput"]);
		if (!$dateFormat) {	
			echo "Votre date convertie au bon format : " . date("d m Y", strtotime($_POST["checkDateInput"]));
		}
		else {
			echo $_POST["checkDateInput"] . " respecte le bon format.";
		}
	}

	?>

	</form>

	<hr>
	<h3>Story 11 : Tri des noms à partir du second caractère</h3>
	<form method="post">

	<?php

	$factory->createTextArea("peopleNames", "Entrez plusieurs noms séparés par des virgules");
	$factory->createSubmitButton();

	if (!empty($_POST["peopleNames"])) {
		$functions->orderNamesBySecondCharacter($_POST["peopleNames"]);
	}

	?>

	</form>

	</div>
	
	<?php include_once 'footer.php';?>
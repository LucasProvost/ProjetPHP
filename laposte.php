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
	<form method="post">
	<div class="container">

	<?php

	$factory = new factory();
	$functions = new functions();

	$database = new databaseconnection("mysql", "semainephp", "127.0.0.1", "guillaume", "coding");

	$requestNames = "SELECT last_name, first_name, email, address FROM contacts";
	$contactsListArray = array();
	$senderInfoArray = array();
	$receiverInfoArray = array();

	foreach ($result = $database->_database->query($requestNames) as $data) {
		array_push($contactsListArray, $data['last_name'] . ' ' . $data['first_name']);
	}

	$factory->createInputCombo("contacts_list1", "Expediteur", $contactsListArray);
	$factory->createInputCombo("contacts_list2", "Destinataire", $contactsListArray);

	$factory->createInputCheckbox("hasTimber", "Voulez-vous un timbre ?");
	$factory->createInputCheckbox("isConfidential", "Votre lettre est-elle confidentielle ?");

	$factory->createSubmitButton();

	$senderName;
	$senderGender;

	$receiverName;
	$receiverGender;

	$envelopeWasGenerated = false;

  	if (!empty($_POST["contacts_list1"]) && !empty($_POST["contacts_list2"])) {
  		if ($_POST["contacts_list1"] != $_POST["contacts_list2"]) {
  			$senderName = explode(" ", $_POST["contacts_list1"]);
  		$requestGender = 'SELECT gender FROM contacts WHERE last_name = "'.$senderName[0].'" AND first_name = "'.$senderName[1].'"';
  		$requestMail = 'SELECT email FROM contacts WHERE last_name = "'.$senderName[0].'" AND first_name = "'.$senderName[1].'"';
  		$requestAddress = 'SELECT address FROM contacts WHERE last_name = "'.$senderName[0].'" AND first_name = "'.$senderName[1].'"';

  	 	foreach ($database->_database->query($requestGender) as $data) {
  	 		if ($data[0] == "man") {
  	 			$senderGender = "Monsieur";
  	 		}
  	 		else {
  	 			$senderGender = "Madame";
  	 		}
  	 	}

  	 	foreach ($database->_database->query($requestMail) as $data) {
  	 		array_push($senderInfoArray, $data[0]);
  	 	}

  	 	foreach ($database->_database->query($requestAddress) as $data) {
  	 		array_push($senderInfoArray, $data[0]);
  	 	}

  	 	$receiverName = explode(" ", $_POST["contacts_list2"]);
  		$requestGenderR = 'SELECT gender FROM contacts WHERE last_name = "'.$receiverName[0].'" AND first_name = "'.$receiverName[1].'"';
  		$requestMailR = 'SELECT email FROM contacts WHERE last_name = "'.$receiverName[0].'" AND first_name = "'.$receiverName[1].'"';
  		$requestAddressR = 'SELECT address FROM contacts WHERE last_name = "'.$receiverName[0].'" AND first_name = "'.$receiverName[1].'"';

  	 	foreach ($database->_database->query($requestGenderR) as $data) {
  	 		if ($data[0] == "man") {
  	 			$receiverGender = "Monsieur";
  	 		}
  	 		else {
  	 			$receiverGender = "Madame";
  	 		}
  	 	}

  	 	foreach ($database->_database->query($requestMailR) as $data) {
  	 		array_push($receiverInfoArray, $data[0]);
  	 	}

  	 	foreach ($database->_database->query($requestAddressR) as $data) {
  	 		array_push($receiverInfoArray, $data[0]);
  	 	}

  	 	echo '<div class="top-left">'.$senderGender.' '.$senderName[0].' '.$senderName[1].'</div>';
  		echo '<div class="bottom-right">'.$receiverGender.' '.$receiverName[0].' '.$receiverName[1].'</div>';

  		if (isset($_POST["hasTimber"])) {
  		echo '<img src="assets/images/stamp.png" class="bottom-left" id="envelopeStamp"/>';
  	}
  	else {
  		echo '<img src="assets/images/dot.png" class="bottom-left" id="envelopeDot"/>';
  	}

  		if (isset($_POST["isConfidential"])) {
  		echo '<img src="assets/images/confidential.png" class="top-right" id="envelopeConfidential"/>';
  	}
  	$envelopeWasGenerated = true;
  		}
  		else {
  			echo "L'expéditeur et le destinatire ne peuvent pas être les mêmes ! </br> Merci de renseigner vos informations à nouveau.</br>";
  		}
  	}

	?>

	<img src="assets/images/envelope.png"/>

	</div>
	<div class="container">

		<?php
		if ($envelopeWasGenerated) {
			echo '<img src="assets/images/paper.png" id="paper"/>';

			echo '<div class="top-left2">'.$senderName[0].' '.$senderName[1].'</div></br>';
			echo '<div class="top-left3">'.$senderInfoArray[0].'</div>';
			echo '<div class="top-left4"> '.$senderInfoArray[1].'</div>';

			echo '<div class="top-right2">'.$receiverName[0].' '.$receiverName[1].'</div></br>';
			echo '<div class="top-right3">'.$receiverInfoArray[0].'</div>';
			echo '<div class="top-right4"> '.$receiverInfoArray[1].'</div>';

			echo '<div class="letterText">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porttitor dapibus tellus id suscipit.
			Donec fringilla hendrerit lacus sit amet maximus. Sed convallis neque sed sapien malesuada interdum. Ut
			gravida consectetur libero, ut euismod augue ultrices sed. Curabitur consequat dapibus ex vitae facilisis.
			Etiam viverra imperdiet purus pellentesque rutrum. Fusce eget nisl ac augue venenatis lobortis blandit id
			dui. Nullam condimentum, magna id laoreet mattis, nisl ligula rutrum leo, sit amet volutpat eros dui a
			mauris. Nunc placerat luctus lacus, eget hendrerit orci ultricies quis. Lorem ipsum dolor sit amet,
			consectetur adipiscing elit. Aliquam porttitor dapibus tellus id suscipit. Donec fringilla hendrerit lacus
			sit amet maximus. Sed convallis neque sed sapien malesuada interdum. Ut gravida consectetur libero, ut
			euismod augue ultrices sed. Curabitur consequat dapibus ex vitae facilisis. Etiam viverra imperdiet purus
			pellentesque rutrum. Fusce eget nisl ac augue venenatis lobortis blandit id dui. Nullam condimentum, magna
			id laoreet mattis, nisl ligula rutrum leo, sit amet volutpat eros dui a mauris. Nunc placerat luctus lacus,
			eget hendrerit orci ultricies quis.
			Nulla efficitur dolor lacus, ut pharetra ante blandit id. Vestibulum vitae urna felis. Mauris elementu
			elit erat, hendrerit scelerisque erat pharetra vitae. Etiam ultrices suscipit erat, quis vulputate
			tellus rhoncus vitae. Aenean pellentesque dui in pellentesque ullamcorper.</div>';

		echo '<div class="top-bottom1">Cordialement '.$senderName[0].' '.$senderName[1].'</div></br>';
		}
		?>

	</div>
</form>

</body>
<footer>
		<p>Copyright 2020</p>
	</footer>
</html>
<?php include_once 'header.php';?>
<?php include_once 'footer.php';?>
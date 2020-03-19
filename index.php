	
		<!-- <form method="post">

		<?/*php

		require 'class/factory.php';

		$factory = new factory();

		$factory->createInputCombo("name", array("Juan", "Adrian", "Lucas", "Guillaume"));
		$factory->createInputText("health", "Points de vie");
		$factory->createInputText("damage", "Dégâts de base");
		$factory->createTextArea("comment1", "Laissez un commentaire");
		$factory->createInputRadio();

		$factory->createSubmitButton();

		*/?>

		</form>

		<?/*php

		require 'dinosaurs/tyrex.php';
		require 'dinosaurs/triceratops.php';

		$fightingDino1;
		$fightingDino2;

		if (!empty($_POST["health"]) && !empty($_POST["damage"])) {
			if ($_POST["dinotype"] == "tyrex") {
				$fightingDino1 = new Tyrex($_POST["damage"], $_POST["health"], $_POST["name"]);
				$fightingDino2 = new Triceratops($_POST["damage"]/2, $_POST["health"]*2, "Enemy");
			}
			else if ($_POST["dinotype"] == "triceratops") {
				$fightingDino1 = new Triceratops($_POST["damage"], $_POST["health"], $_POST["name"]);
				$fightingDino2 = new Tyrex($_POST["damage"]*2, $_POST["health"]/2, "Enemy");
			}
			echo $fightingDino1->getName() . " started the fight with " . $fightingDino1->getHealth() . "HP." . "</br>";
			echo $fightingDino2->getName() . " started the fight with " . $fightingDino2->getHealth() . "HP." . "</br>";

			$fightingDino1->basicAttack($fightingDino2);
			echo $fightingDino1->getName() . " attacked " . $fightingDino2->getName() . " with a basic attack" . " (" . $fightingDino1->getDamage() . " dmg)" ."</br>";
			echo $fightingDino2->getName() . " now has " . $fightingDino2->getHealth() . "HP.";
		}
		
		*/?>
		-->
		<!-- Story 3 -->

		<?php include_once 'header.php';?>
	
		<div id="members">
		<h1>Juan</h1>
		<h1>Lucas</h1>
		<h1>Adrian</h1>
		<h1>Guillaume</h1>
		</div>

		<div>
			<h4>Story terminées : 3/16</h3>
				<li>Story 1</li>
				<li>Story 2</li>
				<li>Story 3</li>
		</div>

		<div>
			<h4>Story à faire : 13/16</h4>
			<li>Story 4</li>
			<li>Story 5</li>
			<li>Story 6</li>
			<li>Story 7</li>
			<li>Story 8</li>
			<li>Story 9</li>
			<li>Story 10</li>
			<li>Story 11</li>
			<li>Story 12</li>
			<li>Story 13</li>
			<li>Story 14</li>
			<li>Story 15</li>
			<li>Story 16</li>
		</div>

		<?php include_once 'footer.php';?>
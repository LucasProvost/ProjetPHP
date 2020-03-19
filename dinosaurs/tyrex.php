<?php

class Tyrex {

	private $_damage;
	private $_health;
	private $_name;

	public function __construct($damage, $health, $name) {

		$this->_damage = $damage;
		$this->_health = $health;
		$this->_name = $name;
	}

	public function getDamage() {
		return $this->_damage;
	}

	public function getHealth() {
		return $this->_health;
	}

	public function getName() {
		return $this->_name;
	}

	public function setHealth($newHealthValue) {
		$this->_health = $newHealthValue;
	}

	public function basicAttack($enemy) {

		$enemy->setHealth($enemy->getHealth() - $this->_damage);
	}

	public function specialAttack($enemy) {
		$damage = $this->_damage * 2;
		$enemy->setHealth($enemy->getHealth() - $damage);
	}

	public function osAttack($enemy) {
		$enemy->setHealth(0);
	}
}

?>
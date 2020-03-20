<?php

/**
 * Class Tyrex
 */
class Tyrex {

    /**
     * @var
     */
    private $_damage;
    /**
     * @var
     */
    private $_health;
    /**
     * @var
     */
    private $_name;

    /**
     * Tyrex constructor.
     * @param $damage
     * @param $health
     * @param $name
     */
    public function __construct($damage, $health, $name) {

		$this->_damage = $damage;
		$this->_health = $health;
		$this->_name = $name;
	}

    /**
     * @return mixed
     */
    public function getDamage() {
		return $this->_damage;
	}

    /**
     * @return mixed
     */
    public function getHealth() {
		return $this->_health;
	}

    /**
     * @return mixed
     */
    public function getName() {
		return $this->_name;
	}

    /**
     * @param $newHealthValue
     */
    public function setHealth($newHealthValue) {
		$this->_health = $newHealthValue;
	}

    /**
     * @param $enemy
     */
    public function basicAttack($enemy) {

		$enemy->setHealth($enemy->getHealth() - $this->_damage);
	}

    /**
     * @param $enemy
     */
    public function specialAttack($enemy) {
		$damage = $this->_damage * 2;
		$enemy->setHealth($enemy->getHealth() - $damage);
	}

    /**
     * @param $enemy
     */
    public function osAttack($enemy) {
		$enemy->setHealth(0);
	}
}

?>
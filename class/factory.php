<?php

class Factory {

	public function createInputText($label, $text) {
		echo '<div class="centerColumn">';
		echo '<label for="'. $label . '">'. $text . '</label>';
		echo '<input type="text" class="inputText" name="'. $label . '" id="'. $label . '"></input>';
		echo '</div>';
	}

	public function createTextArea($label, $text) {
		echo '<div class="centerColumn">';
		echo '<label for="'. $label . '">'. $text . '</label>';
		echo '<textarea name="'. $label . '" id="'. $label . '" rows="5"></textarea>';
		echo '</div>';
	}

	public function createInputDate($label, $text) {
		echo '<div class="centerColumn">';
		echo '<label for="'. $label . '">'. $text . '</label>';
		echo '<input type="date" name="'. $label . '" id="'. $label . '"></input>';
		echo '</div>';
	}

	public function createInputCombo($label, $values) {
		echo '<div class="centerColumn">';
		echo '<label for="'. $label . '">Nom du dinosaure</label>';
		echo '<select name="'. $label . '" id="'. $label . '">';
		foreach ($values as $value) {
			echo '<option value="'. $value . '">'. $value . '</option>';
		}
		echo '</select>';
		echo '</div>';
	}

	public function createInputRadio() {
		echo '<div class="centerLine" id="selectDino">';
  		echo '<input type="radio" id="tyrex" name="dinotype" value="tyrex" checked>';
  		echo '<label for="tyrex">Tyrex</label>';

  		echo '<input type="radio" id="triceratops" name="dinotype" value="triceratops">';
  		echo '<label for="triceratops">Triceratops</label>';
		echo '</div>';
	}

	public function createSubmitButton() {
		echo '<div class="centerColumn">';
		echo '<input type="submit" class="inputSubmit" value="Validate"></input>';
		echo '</div>';
	}
}

?>
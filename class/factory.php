<?php

/**
 * Class Factory
 */
class Factory {

    /**
     * This function allow to create a input text.
     * @param $label
     * @param $text
     */
    public function createInputText($label, $text) {
		echo '<div class="centerColumn">';
		echo '<label for="'. $label . '">'. $text . '</label>';
		echo '<input type="text" class="inputText" name="'. $label . '" id="'. $label . '"></input>';
		echo '</div>';
	}

    /**
     *createTextArea creating a block where we can input texte
     * @param $label
     * @param $text
     */
    public function createTextArea($label, $text) {
		echo '<div class="centerColumn">';
		echo '<label for="'. $label . '">'. $text . '</label>';
		echo '<textarea name="'. $label . '" id="'. $label . '" rows="5"></textarea>';
		echo '</div>';
	}

    /**
     * createInputDate allow to choice a date
     * @param $label
     * @param $text
     */
    public function createInputDate($label, $text) {
		echo '<div class="centerColumn">';
		echo '<label for="'. $label . '">'. $text . '</label>';
		echo '<input type="date" name="'. $label . '" id="'. $label . '"></input>';
		echo '</div>';
	}

    /**
     * This function is a dropdown-list with values
     * @param $label
     * @param $text
     * @param $values
     */
    public function createInputCombo($label, $text, $values) {
		echo '<div class="centerColumn">';
		echo '<label for="'. $label . '">'.$text.'</label>';
		echo '<select name="'. $label . '" id="'. $label . '">';
		echo '<option value="" selected></option>';
		foreach ($values as $value) {
			echo '<option value="'. $value . '">'. $value . '</option>';
		}
		echo '</select>';
		echo '</div>';
	}

    /**
     *This following function allow to create a radio button.
     */
    public function createInputRadio() {
		echo '<div class="centerLine" id="selectDino">';
  		echo '<input type="radio" id="tyrex" name="dinotype" value="tyrex" checked>';
  		echo '<label for="tyrex">Tyrex</label>';

  		echo '<input type="radio" id="triceratops" name="dinotype" value="triceratops">';
  		echo '<label for="triceratops">Triceratops</label>';
		echo '</div>';
	}

	public function createInputCheckbox($label, $text) {
		echo '<label for="'. $label . '">'. $text . '</label>';
		echo '<input type="checkbox" name="'. $label . '">';
	}

	/**
     *The submit button validate the form
     */
    public function createSubmitButton() {
    
		echo '<div class="centerColumn">';
		echo '<input type="submit" class="inputSubmit" value="Validate"></input>';
		echo '</div>';
	}
}

?>
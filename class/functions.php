<?php

class Functions {

	public function getPrimeNumbers($n) {
		$primeNumbersArray = array();

		 $negatif = false;
            if ($n < 0) {
                $negatif = true;
                $n = -$n;
            }
            for ($i = 2; $i <= $n; $i++) {
                $nbDiv = 0;
                for ($j = 1; $j <= $i; $j++) {
                    if ($i % $j == 0) {
                        $nbDiv++;
                    }
                }
                if ($nbDiv == 2) {
                    if ($negatif) {
                        
                    }
                    array_push($primeNumbersArray, $i);
                }
            }

            return $primeNumbersArray;
	}

    public function getLowestNumber($first_n, $second_n, $third_n) {
        $numbersArray = array();
        foreach (func_get_args() as $arg) {
            array_push($numbersArray, $arg);
        }
        
        return min($numbersArray);
    }

    public function goBackInTime($seconds) {
        $now = strtotime("now");
        $time = date("d-m-Y", $now - $seconds);
        return $time;
    }
}

?>
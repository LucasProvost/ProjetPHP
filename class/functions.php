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

    public function getRomanNumber($number) {

        // 1 à 9
        $romannumbers1 = array("","I","II","III","IV","V","VI","VII","VIII","IX");

        // Dizaines jusqu'à 90
        $romannumbers2 = array("","X","XX","XXX","XL","L","LX","LXX","LXXX","XC");

        // Centaines jusqu'à 900
        $romannumbers3 = array("","C","CC","CCC","CD","D","DC","DCC","DCCC","CM");

        // Milliers jusqu'à 9000
        $romannumbers4 = array("","M","MM","MMM","IVM","VM","VIM","VIIM","VIIIM","IXM");

        $roman=$romannumbers1[$number%10];
        $number-=($number%10);
        $number/=10;

        $roman=$romannumbers2[$number%10].$roman;
        $number-=($number%10);
        $number/=10;

        $roman=$romannumbers3[$number%10].$roman;
        $number-=($number%10);
        $number/=10;

        $roman=$romannumbers4[$number%10].$roman;
        $number%10;

        return $roman;

    }
}

?>
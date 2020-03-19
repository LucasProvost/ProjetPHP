<?php

/**
 * Class Functions
 */
class Functions {

    /**
     * This function calculate all prime numbers with variable $n
     * @param $n
     * @return array
     */
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

    /**
     * The next function show us the lowest number between the 3 numbers
     * @param $first_n
     * @param $second_n
     * @param $third_n
     * @return mixed
     */
    public function getLowestNumber($first_n, $second_n, $third_n) {
        $numbersArray = array();
        foreach (func_get_args() as $arg) {
            array_push($numbersArray, $arg);
        }
        
        return min($numbersArray);
    }

    /**
     *
     * @param $seconds
     * @return false|string
     */
    public function goBackInTime($seconds) {
        $now = strtotime("now");
        $time = date("d-m-Y", $now - $seconds);
        return $time;
    }

    /**
     * Change the arabian numbers into romanian numbers
     * @param $number
     * @return mixed|string
     */
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

    /**
     * With this function we can found all the factorial numbers gmp_fact() it's a php function
     * @param $number
     * @return GMP|int|resource
     */
    public function getFactorial($number) {

        if ($number >= 1) {
            return gmp_fact($number);
        }
        else if (is_null($number)) {
            return 1;
        }
    }

    /**
     * change the decimal numbers into hexadecimal number
     * @param $number
     * @return string
     */
    public function getDecimal($number) {
        return dechex($number);
    }

    /**
     * change the decimal number in binary
     * @param $number
     * @return string
     */
    public function getBinary($number) {
        return decbin($number);
    }

    /**
     *With this function you can order the names by alphabetical order with the second letter of the names
     * @param $names
     */
    public function orderNamesBySecondCharacter($names) {
        $namesArray = explode(",", $names);
        $newArray1 = array();
        $firstLetterArray = array();
        $withoutLetterArray = array();

        foreach($namesArray as $name) {
            $newArray1[$name] = $name;
            $withoutLetterArray[$name] = substr_replace($name, "", 0, 1);
        }

        foreach ($newArray1 as $name) {
            $firstLetterArray[$name] = $name{0};
        }

        asort($withoutLetterArray, SORT_STRING);

        /*var_dump($newArray1);
        echo "</br>";
        var_dump($firstLetterArray);
        echo "</br>";
        var_dump($withoutLetterArray);
        echo "</br>";*/
        $i = 0;
        foreach ($withoutLetterArray as $key => $value) {
            $i++;
            $value = $key{0} . $value;
            echo "[ ". $i . " ] " . $value . "</br>";
        }
    }
}

?>
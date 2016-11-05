<?php

namespace TddCourse;

/**
 * Created by PhpStorm.
 * User: blush
 * Date: 2016. 11. 05.
 * Time: 11:14
 */
class RomanNumeral
{
    protected $romanNumeralValues;

    /**
     * RomanNumeral constructor.
     */
    public function __construct()
    {
        $this->romanNumeralValues = array(
            "I" => 1,
            "V" => 5,
            "X" => 10,
            "L" => 50,
            "C" => 100,
            "D" => 500,
            "M" => 1000,
        );
    }

    /**
     * @param string $romanNumeral
     * @return int
     */
    public function convert($romanNumeral)
    {
        $result = 0;
        $len = strlen($romanNumeral) - 1;

        for ($i = 0; $i <= $len; $i++) {
            $current = $this->romanNumeralValues[$romanNumeral[$i]];
            $next = $this->getNextRoman($romanNumeral, $i, $len);

            if ($next > $current) {
                $current *= -1;
            }

            $result += $current;
        }

        return $result;
    }

    /**
     * @param string $romanNumeral
     * @param int $i
     * @param int $len
     *
     * @return int
     */
    private function getNextRoman($romanNumeral, $i, $len)
    {
        $value = 0;

        if ($i < $len) {
            $value = $this->romanNumeralValues[$romanNumeral[$i + 1]];
        }

        return $value;
    }
}
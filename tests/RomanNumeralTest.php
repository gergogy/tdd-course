<?php

namespace TddCourse\Tests;
use TddCourse\RomanNumeral;

/**
 * Created by PhpStorm.
 * User: blush
 * Date: 2016. 11. 05.
 * Time: 11:09
 */
class RomanNumeralTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RomanNumeral
     */
    private $romanNumeral;

    public function setUp()
    {
        $this->romanNumeral = new RomanNumeral();
    }

    public function testSingleRoman() {
        $this->assertEquals(1, $this->romanNumeral->convert("I"));
        $this->assertEquals(5, $this->romanNumeral->convert("V"));
        $this->assertEquals(10, $this->romanNumeral->convert("X"));
        $this->assertEquals(50, $this->romanNumeral->convert("L"));
        $this->assertEquals(100, $this->romanNumeral->convert("C"));
        $this->assertEquals(500, $this->romanNumeral->convert("D"));
        $this->assertEquals(1000, $this->romanNumeral->convert("M"));
    }

    /**
     * @depends testSingleRoman
     */
    public function testComposedNumbers()
    {
        $this->assertEquals(2, $this->romanNumeral->convert("II"));
        $this->assertEquals(6, $this->romanNumeral->convert("VI"));
        $this->assertEquals(16, $this->romanNumeral->convert("XVI"));
        $this->assertEquals(150, $this->romanNumeral->convert("CL"));
        $this->assertEquals(1500, $this->romanNumeral->convert("MD"));
        $this->assertEquals(2016, $this->romanNumeral->convert("MMXVI"));
    }

    /**
     * @depends testComposedNumbers
     */
    public function testComposedNumbersWithRegression()
    {
        $this->assertEquals(4, $this->romanNumeral->convert("IV"));
        $this->assertEquals(14, $this->romanNumeral->convert("XIV"));
        $this->assertEquals(40, $this->romanNumeral->convert("XL"));
    }
}
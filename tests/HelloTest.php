<?php

namespace TddCourse\Tests;

use TddCourse\Hello;

/**
 * Class HelloTest
 * @package TddCourse\Tests
 */
class HelloTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Hello
     */
    protected $hello;

    public function setUp()
    {
        $this->hello = new Hello();
    }

    public function testSay()
    {
        $this->assertSame('Hello World!', $this->hello->say());
    }
}
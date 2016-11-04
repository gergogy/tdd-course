<?php

namespace TddCourse\Tests;

use TddCourse\Hello;

/**
 * Created by PhpStorm.
 * User: blush
 * Date: 2016. 11. 01.
 * Time: 23:10
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
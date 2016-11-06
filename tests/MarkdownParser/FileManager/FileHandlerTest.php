<?php

namespace TddCourse\Tests\MarkdownParser\FileManager;

use TddCourse\MarkdownParser\FileManager\FileHandler;

/**
 * Class FileHandlerTest
 * @package TddCourse\Tests\FileManager
 */
class FileHandlerTest extends \PHPUnit_Framework_TestCase
{
    const MODE = 'r';

    /**
     * @var FileHandler
     */
    protected $handler;

    /**
     * @var string
     */
    protected $path;

    public function setUp()
    {
        $this->path = getcwd() . '/test.txt';
        file_put_contents($this->path, '');
        $this->handler = $this->getMockForAbstractClass(FileHandler::class, array($this->path));
    }

    public function testOpen()
    {
        $this->assertTrue($this->handler->open(self::MODE));
        $this->assertFalse($this->handler->open(self::MODE));
    }

    /**
     * @depends testOpen
     */
    public function testClose()
    {
        $this->assertFalse($this->handler->close());
        $this->handler->open(self::MODE);
        $this->assertTrue($this->handler->close());
    }

    public function tearDown()
    {
        $this->handler->close();
        unlink($this->path);
    }
}
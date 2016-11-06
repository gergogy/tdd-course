<?php

namespace TddCourse\Tests\MarkdownParser\FileManager;

use TddCourse\MarkdownParser\FileManager\FileReader;

/**
 * Class FileReaderTest
 * @package TddCourse\Tests\FileManager
 */
class FileReaderTest extends \PHPUnit_Framework_TestCase
{
    const TEST_STRING = 'test';

    /**
     * @var FileReader
     */
    protected $reader;

    /**
    * @var string
    */
    protected $path;

    public function setUp()
    {
        $this->path = getcwd() . '/test.txt';
        file_put_contents($this->path, self::TEST_STRING);
        $this->reader = new FileReader($this->path);
    }

    public function testRead()
    {
        $this->reader->open('r');
        $this->assertSame(self::TEST_STRING, $this->reader->read());
        $this->assertFalse($this->reader->read());
    }

    public function tearDown()
    {
        $this->reader->close();
        unlink($this->path);
    }
}
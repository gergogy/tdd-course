<?php

namespace TddCourse\Tests\MarkdownParser\FileManager;

use TddCourse\MarkdownParser\FileManager\FileWriter;

/**
 * Class FileWriterTest
 * @package TddCourse\Tests\FileManager
 */
class FileWriterTest extends \PHPUnit_Framework_TestCase
{
    const
        MODE = 'wb',
        TEST_STRING = 'test';

    /**
     * @var FileWriter
     */
    protected $writer;

    /**
     * @var string
     */
    protected $path;

    public function setUp()
    {
        $this->path = getcwd() . '/test.txt';
        $this->writer = new FileWriter($this->path);
    }

    public function testRead()
    {
        $this->writer->open(self::MODE);
        $this->assertTrue($this->writer->write(self::TEST_STRING));
        $this->assertSame(self::TEST_STRING . PHP_EOL, file_get_contents($this->path));
    }

    public function tearDown()
    {
        $this->writer->close();
        unlink($this->path);
    }
}
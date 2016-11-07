<?php

namespace TddCourse\MarkdownParser;

/**
 * Class ParseFileTest
 * @package TddCourse\MarkdownParser
 */
class ParseFileTest extends \PHPUnit_Framework_TestCase
{
    const
        INPUT_FILE = '/input.txt',
        OUTPUT_FILE = '/output.txt',
        TEST_STRING = 'This **_test_** string is _[http://example.com](complex)_, and this is an ![http://example.com](image).',
        EXPECTED = 'This <strong><i>test</i></strong> string is <i><a href="http://example.com">complex</a></i>, and this is an <img src="http://example.com" alt="image" />.';

    /**
     * @var ParseFile
     */
    protected $parser;

    /**
     * @var string
     */
    protected $inputPath;

    /**
     * @var string
     */
    protected $outputPath;

    public function setUp()
    {
        $this->inputPath = getcwd() . self::INPUT_FILE;
        $this->outputPath = getcwd() . self::OUTPUT_FILE;
        file_put_contents($this->inputPath, self::TEST_STRING);
        $this->parser = new ParseFile($this->inputPath, $this->outputPath, new MarkdownParser());
    }

    public function testParseFile()
    {
        $this->assertEquals(1, $this->parser->parseFile());
        $this->assertSame(self::EXPECTED . PHP_EOL, file_get_contents($this->outputPath));
    }

    public function tearDown()
    {
        unlink($this->inputPath);
        unlink($this->outputPath);
    }
}
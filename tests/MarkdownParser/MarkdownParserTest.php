<?php

namespace TddCourse\Tests\MarkdownParser;

use TddCourse\MarkdownParser\MarkdownParser;

/**
 * Class MarkdownParserTest
 * @package TddCourse\Tests\MarkdownParser
 */
class MarkdownParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    const
        TEST_STRING = 'This **_test_** string is _[http://example.com](complex)_, and this is an ![http://example.com](image).',
        EXPECTED = 'This <strong><i>test</i></strong> string is <i><a href="http://example.com">complex</a></i>, and this is an <img src="http://example.com" alt="image">.';

    /**
     * @var MarkdownParser
     */
    protected $parser;

    public function setUp()
    {
        $this->parser = new MarkdownParser();
    }

    public function testParsing()
    {
        $this->assertSame(self::EXPECTED, $this->parser->parse(self::TEST_STRING));
    }
}
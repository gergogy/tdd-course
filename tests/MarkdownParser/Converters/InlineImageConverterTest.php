<?php

namespace TddCourse\Tests\MarkdownParser\Converters;

use TddCourse\MarkdownParser\Converters\ConverterInterface;
use TddCourse\MarkdownParser\Converters\InlineImageConverter;

/**
 * Class InlineImageConverterTest
 * @package TddCourse\Tests\MarkdownParser\Converters
 */
class InlineImageConverterTest extends \PHPUnit_Framework_TestCase
{
    const TEST_STRING = '![http://example.com](example)';
    /**
     * @var ConverterInterface
     */
    protected $converter;

    public function setUp()
    {
        $this->converter = new InlineImageConverter();
    }

    public function testConverting()
    {
        $this->assertSame(
            '<img src="http://example.com" alt="example" />',
            $this->converter->convert(self::TEST_STRING)
        );
    }
}
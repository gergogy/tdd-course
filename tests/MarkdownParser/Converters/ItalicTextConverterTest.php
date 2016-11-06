<?php

namespace TddCourse\Tests\MarkdownParser\Converters;

use TddCourse\MarkdownParser\Converters\ConverterInterface;
use TddCourse\MarkdownParser\Converters\ItalicTextConverter;

/**
 * Class ItalicTextConverterTest
 * @package TddCourse\Tests\MarkdownParser\Converters
 */
class ItalicTextConverterTest extends \PHPUnit_Framework_TestCase
{
    const TEST_STRING = '_test_';
    /**
     * @var ConverterInterface
     */
    protected $converter;

    public function setUp()
    {
        $this->converter = new ItalicTextConverter();
    }

    public function testConverting()
    {
        $this->assertSame("<i>test</i>", $this->converter->convert(self::TEST_STRING));
    }
}
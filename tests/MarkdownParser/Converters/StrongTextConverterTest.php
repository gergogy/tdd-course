<?php

namespace TddCourse\Tests\MarkdownParser\Converters;

use TddCourse\MarkdownParser\Converters\ConverterInterface;
use TddCourse\MarkdownParser\Converters\StrongTextConverter;

/**
 * Class StrongTextConverterTest
 * @package TddCourse\MarkdownParser\Converters
 */
class StrongTextConverterTest extends \PHPUnit_Framework_TestCase
{
    const TEST_STRING = '**test**';
    /**
     * @var ConverterInterface
     */
    protected $converter;

    public function setUp()
    {
        $this->converter = new StrongTextConverter();
    }

    public function testConverting()
    {
        $this->assertSame("<strong>test</strong>", $this->converter->convert(self::TEST_STRING));
    }
}
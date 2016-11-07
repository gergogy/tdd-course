<?php

namespace TddCourse\Tests\MarkdownParser\Converters;

use TddCourse\MarkdownParser\Converters\ConverterInterface;
use TddCourse\MarkdownParser\Converters\MonospaceTextConverter;

/**
 * Class MonospaceTextConverterTest
 * @package TddCourse\Tests\MarkdownParser\Converters
 */
class MonospaceTextConverterTest extends \PHPUnit_Framework_TestCase
{
    const TEST_STRING = '`test`';

    /**
     * @var ConverterInterface
     */
    protected $converter;

    public function setUp()
    {
        $this->converter = new MonospaceTextConverter();
    }

    public function testConverting()
    {
        $this->assertSame('<pre>test</pre>', $this->converter->convert(self::TEST_STRING));
    }
}
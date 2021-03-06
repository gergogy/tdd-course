<?php

namespace TddCourse\TestsMarkdownParser\Converters;

use TddCourse\MarkdownParser\Converters\ConverterInterface;
use TddCourse\MarkdownParser\Converters\InlineLinkConverter;

/**
 * Class InlineLinkConverterTest
 * @package TddCourse\TestsMarkdownParser\Converters
 */
class InlineLinkConverterTest extends \PHPUnit_Framework_TestCase
{
    const TEST_STRING = '[http://example.com](example)';
    /**
     * @var ConverterInterface
     */
    protected $converter;

    public function setUp()
    {
        $this->converter = new InlineLinkConverter();
    }

    public function testConverting()
    {
        $this->assertSame(
            '<a href="http://example.com">example</a>',
            $this->converter->convert(self::TEST_STRING)
        );
    }
}
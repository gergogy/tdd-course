<?php

namespace TddCourse\Tests\MarkdownParser\Converters;

use TddCourse\MarkdownParser\Converters\Converter;
use TddCourse\MarkdownParser\Converters\ConverterFactory;
use TddCourse\MarkdownParser\Converters\ConverterInterface;
use TddCourse\MarkdownParser\Converters\StrongTextConverter;

class ConverterFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ConverterFactory
     */
    protected $factory;

    public function setUp()
    {
        $this->factory = new ConverterFactory();
    }

    public function testFactory()
    {
        $converters = $this->factory->getConverters();

        $this->assertInternalType('array', $converters);

        if (!empty($converters)) {
            $this->assertContainsOnlyInstancesOf(ConverterInterface::class, $converters);

        }
    }
}
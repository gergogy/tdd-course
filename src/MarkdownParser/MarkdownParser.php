<?php

namespace TddCourse\MarkdownParser;

use TddCourse\MarkdownParser\Converters\ConverterFactory;
use TddCourse\MarkdownParser\Converters\ConverterInterface;

/**
 * Class MarkdownParser
 * @package TddCourse\MarkdownParser
 */
class MarkdownParser
{
    /**
     * @var array
     */
    protected $converters;

    /**
     * MarkdownParser constructor.
     */
    public function __construct()
    {
        $factory = new ConverterFactory();
        $this->converters = $factory->getConverters();
    }

    /**
     * @param string $rawString
     * @return string
     */
    public function parse($rawString)
    {
        /** @var ConverterInterface $converter **/
        foreach ($this->converters as $converter) {
            $rawString = $converter->convert($rawString);
        }

        return $rawString;
    }
}
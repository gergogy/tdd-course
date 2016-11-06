<?php
/**
 * Created by PhpStorm.
 * User: blush
 * Date: 2016. 11. 06.
 * Time: 13:57
 */

namespace TddCourse\MarkdownParser;


use TddCourse\MarkdownParser\Converters\ConverterFactory;
use TddCourse\MarkdownParser\Converters\ConverterInterface;

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
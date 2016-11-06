<?php

namespace TddCourse\MarkdownParser\Converters;

/**
 * Interface ConverterInterface
 * @package TddCourse\MarkdownParser\Converters
 */
interface ConverterInterface
{
    /**
     * @param string $string
     * @return string
     */
    public function convert($string);
}
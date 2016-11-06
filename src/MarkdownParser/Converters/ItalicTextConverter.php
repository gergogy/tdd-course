<?php

namespace TddCourse\MarkdownParser\Converters;

/**
 * Class ItalicTextConverter
 * @package TddCourse\MarkdownParser\Converters
 */
class ItalicTextConverter implements ConverterInterface
{
    /**
     * @param string $string
     * @return mixed
     */
    public function convert($string)
    {
        $pattern = '/_(.*)_/U';
        $replacement = '<i>$1</i>';

        return preg_replace($pattern, $replacement, $string);
    }
}
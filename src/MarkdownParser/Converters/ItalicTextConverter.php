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
        $pattern = '/(^|\s|>|\b)_(?=\S)([\s\S]+?)_/'; // _(.*)_ was too simple
        $replacement = '$1<i>$2</i>';

        return preg_replace($pattern, $replacement, $string);
    }
}
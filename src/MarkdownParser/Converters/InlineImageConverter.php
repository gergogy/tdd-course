<?php

namespace TddCourse\MarkdownParser\Converters;

/**
 * Class InlineImageConverter
 * @package TddCourse\MarkdownParser\Converters
 */
class InlineImageConverter implements ConverterInterface
{
    /**
     * @param string $string
     * @return mixed
     */
    public function convert($string)
    {
        $pattern = '/!\[(.*)\]\((.*)\)/U';

        return preg_replace_callback(
            $pattern,
            function ($matches) {
                return '<img src="' . $matches[1] . '" alt="' . $matches[2] . '" />';
            },
            $string
        );
    }
}
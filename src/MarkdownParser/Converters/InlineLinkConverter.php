<?php

namespace TddCourse\MarkdownParser\Converters;

/**
 * Class InlineImageConverter
 * @package TddCourse\MarkdownParser\Converters
 */
class InlineLinkConverter implements ConverterInterface
{
    /**
     * @param string $string
     * @return mixed
     */
    public function convert($string)
    {
        $pattern = '/\[(.*)\]\((.*)\)/U';

        return preg_replace_callback(
            $pattern,
            function ($matches) {
                return '<a href="' . $matches[1] . '">' . $matches[2] . '</a>';
            },
            $string
        );
    }
}
<?php

namespace TddCourse\MarkdownParser\Converters;

/**
 * Class StrongText
 * @package TddCourse\MarkdownParser\Converters
 */
class StrongTextConverter implements ConverterInterface
{
    /**
     * @param string $string
     * @return mixed
     */
    public function convert($string)
    {
        $pattern = '/\*{2}(.*)\*{2}/U';
        $replacement = '<strong>$1</strong>';

        return preg_replace($pattern, $replacement, $string);
    }
}
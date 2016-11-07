<?php

namespace TddCourse\MarkdownParser\Converters;

/**
 * Class MonospaceTextConverter
 * @package TddCourse\MarkdownParser\Converters
 */
class MonospaceTextConverter implements ConverterInterface
{
    /**
     * @param string $string
     * @return string
     */
    public function convert($string)
    {
        $pattern = '/`([^`]*)`/U';
        $replacement = '<pre>$1</pre>';

        return preg_replace($pattern, $replacement, $string);
    }
}
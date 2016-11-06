<?php
/**
 * Created by PhpStorm.
 * User: blush
 * Date: 2016. 11. 06.
 * Time: 12:56
 */

namespace TddCourse\MarkdownParser\Converters;


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
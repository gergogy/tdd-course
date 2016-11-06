<?php

namespace TddCourse\MarkdownParser\Converters;

/**
 * Class ConverterFactory
 * @package TddCourse\MarkdownParser
 */
class ConverterFactory
{
    private $classes = array(
        'strong' => 'getStrong',
        'italic' => 'getItalic',
        'image' => 'getImage',
        'link' => 'getLink'
    );

    public function getConverters() {
        $converters = array();

        foreach ($this->classes as $method) {
            $converters[] = $this->$method();
        }

        return $converters;
    }

    /**
     * @param $data
     * @return StrongTextConverter
     */
    private function getStrong()
    {
        return new StrongTextConverter();
    }

    /**
     * @param $data
     * @return ItalicTextConverter
     */
    private function getItalic()
    {
        return new ItalicTextConverter();
    }

    /**
     * @param $data
     * @return InlineImageConverter
     */
    private function getImage()
    {
        return new InlineImageConverter();
    }

    /**
     * @param $data
     * @return InlineLinkConverter
     */
    private function getLink()
    {
        return new InlineLinkConverter();
    }
}
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
     * @return StrongTextConverter
     */
    private function getStrong()
    {
        return new StrongTextConverter();
    }

    /**
     * @return ItalicTextConverter
     */
    private function getItalic()
    {
        return new ItalicTextConverter();
    }

    /**
     * @return InlineImageConverter
     */
    private function getImage()
    {
        return new InlineImageConverter();
    }

    /**
     * @return InlineLinkConverter
     */
    private function getLink()
    {
        return new InlineLinkConverter();
    }
}
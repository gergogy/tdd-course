<?php

namespace TddCourse\MarkdownParser\FileManager;

/**
 * Interface WriterInterface
 * @package TddCourse\FileManager
 */
interface WriterInterface
{
    /**
     * @param string $string
     * @return bool
     * @throws \Exception
     */
    public function write($string);
}
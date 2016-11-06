<?php

namespace TddCourse\MarkdownParser\FileManager;

/**
 * Interface ReaderInterface
 * @package TddCourse\FileManager
 */
interface ReaderInterface
{
    /**
     * @return bool
     * @throws \Exception
     */
    public function read();
}
<?php

namespace TddCourse\MarkdownParser\FileManager;

/**
 * Class FileWriter
 * @package TddCourse\FileManager
 */
class FileWriter extends FileHandler implements WriterInterface
{
    /**
     * @param string $string
     * @return bool
     * @throws \Exception
     */
    public function write($string)
    {
        if ($this->fileHandler) {
            if (fwrite($this->fileHandler, $string . PHP_EOL)) {
                return true;
            }
        }

        return false;
    }
}
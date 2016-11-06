<?php

namespace TddCourse\MarkdownParser\FileManager;

/**
 * Class FileReader
 * @package TddCourse\FileManager
 */
class FileReader extends FileHandler implements ReaderInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function read()
    {
        if ($this->fileHandler) {
            return fgets($this->fileHandler);
        }

        return false;
    }
}
<?php

namespace TddCourse\MarkdownParser\FileManager;

/**
 * Class FileHandler
 * @package TddCourse\MarkdownParser\FileManager
 */
abstract class FileHandler
{
    /**
     * @var string
     */
    protected $path;

    protected $fileHandler = null;

    /**
     * FileHandler constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param string $mode
     * @return bool
     * @throws \Exception
     */
    public function open($mode)
    {
        if ($this->fileHandler == null) {
            try {
                $this->fileHandler = fopen($this->path, $mode);
            } catch (\Exception $e) {
                throw new \Exception('Failed to open file: ' . $this->path . (file_exists($this->path) ? '' : '. File not exists.'));
            }
        } else {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function close()
    {
        if (!is_null($this->fileHandler)) {
            if (!fclose($this->fileHandler)) {
                throw new \Exception('Failed to close file: ' . $this->path);
            }

            $this->fileHandler = null;
        } else {
            return false;
        }

        return true;
    }
}
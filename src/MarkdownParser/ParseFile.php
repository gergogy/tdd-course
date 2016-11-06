<?php

namespace TddCourse\MarkdownParser;

use TddCourse\MarkdownParser\FileManager\FileReader;
use TddCourse\MarkdownParser\FileManager\FileWriter;

/**
 * Class ParseFile
 * @package TddCourse\MarkdownParser
 */
class ParseFile
{
    protected $reader;

    protected $writer;

    /**
     * @var MarkdownParser
     */
    protected $parser;

    /**
     * @var int
     */
    protected $parsedLines;

    /**
     * ParseFile constructor.
     *
     * @param string $inputPath
     * @param string $outputPath
     */
    public function __construct($inputPath, $outputPath)
    {
        $this->reader = new FileReader($inputPath);
        $this->writer = new FileWriter($outputPath);
        $this->parser = new MarkdownParser();
        $this->parsedLines = 0;
    }

    /**
     * @return int
     */
    public function parseFile()
    {
        $this->openFiles();
        $line = $this->reader->read();

        while ($line) {
            $this->writer->write($this->parser->parse($line));
            $this->parsedLines++;
            $line = $this->reader->read();
        }

        $this->closeFiles();

        return $this->parsedLines;
    }

    private function openFiles()
    {
        $this->reader->open('r');
        $this->writer->open('wb');
    }

    private function closeFiles()
    {
        $this->reader->close();
        $this->writer->close();
    }
}
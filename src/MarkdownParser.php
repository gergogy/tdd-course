<?php
/**
 * Created by PhpStorm.
 * User: blush
 * Date: 2016. 11. 01.
 * Time: 23:32
 */

namespace TddCourse;

/**
 * Class MarkdownParser
 * @package TddCourse
 */
class MarkdownParser
{
    protected $chunk;

    protected $patterns = array(
        "/_{2}(.*)_{2}/" => '<strong>$1</strong>',
        "/\*{2}(.*)\*{2}/" => '<strong>$1</strong>',
        "/_(.*)_/" => '<em>$1</em>',
        "/\*(.*)\*/" => '<em>$1</em>',
        "/`(\w+)`/" => '<code>$1</code>',
        "/(*ANY)-{3,}/" => '<hr />',
        "/(#{1,6})\s(.*)/" => 'self::headerText',
        "/( {2})(\r|\n|\r\n|\r\r|\n\n|\n\r)/" => '<br />$2',
        "/(*ANY)\[(.*)\]\((.*)\)/" => '<a href="$2">$1</a>',
        "/[0-9]+\.\s(.*)/" => 'self::orderedList',
        "/\*\s(.*)/" => 'self::unorderedList',
        "/\s+<ul>/" => '<ul>',
        "/\s+<ol>/" => '<ol>',
        '/\n([^\n]+)\n\n/' => 'self::paragraph',
    );

    /**
     * @return MarkdownParser $this
     */
    public function parse()
    {
        foreach ($this->patterns as $pattern => $function) {
            if (is_callable($function)) {
                $this->chunk = preg_replace_callback($pattern, $function, $this->chunk);
            } else {
                $this->chunk = preg_replace($pattern, $function, $this->chunk);
            }
        }

        return $this;
    }

    /**
     * @param $match
     * @return string
     */
    private static function headerText($match)
    {
        list ($tmp, $chars, $header) = $match;
        $level = strlen($chars);
        return '<h' . $level . '>' . trim($header) . '</h' . $level . '>';
    }

    /**
     * @param $match
     * @return string
     */
    private static function orderedList($match) {
        $item = $match[1];
        return sprintf("<ol>\n\t<li>%s</li>\n</ol>", trim($item));
    }

    /**
     * @param $match
     * @return string
     */
    private static function unorderedList($match) {
        $item = $match[1];
        return sprintf("<ul>\n\t<li>%s</li>\n</ul>", trim($item));
    }

    /**
     * @param $match
     * @return string
     */
    private static function paragraph($match) {
        $line = $match[1];
        $trimmed = trim($line);
        if (preg_match ('/^<\/?(ul|ol|li|h|p|bl)/', $trimmed)) {
            return "\n" . $line . "\n";
        }
        return sprintf ("\n<p>%s</p>\n", $trimmed);
    }

    /**
     * @return string
     */
    public function getChunk()
    {
        return $this->chunk;
    }

    /**
     * @param string $chunk
     * @return MarkdownParser
     */
    public function setChunk($chunk)
    {
        $this->chunk = $chunk;

        return $this;
    }
}
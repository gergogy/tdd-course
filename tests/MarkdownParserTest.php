<?php
/**
 * Created by PhpStorm.
 * User: blush
 * Date: 2016. 11. 02.
 * Time: 0:31
 */

namespace TddCourse\Tests;


use TddCourse\MarkdownParser;

class MarkdownParserTest extends \PHPUnit_Framework_TestCase
{
    const
        INPUT = "
# Heading

## Sub-heading

### Another deeper heading
 
Paragraphs are separated
by a blank line.

Two spaces at the end of a line leave a  
line break.

Text attributes _italic_, *italic*, __bold__, **bold**, `monospace`.

Horizontal rule:

---

Bullet list:

  * apples
  * oranges
  * pears

Numbered list:

  1. apples
  2. oranges
  3. pears

A [link](http://example.com).",
        OUTPUT = '
<h1>Heading</h1>

<h2>Sub-heading</h2>

<h3>Another deeper heading</h3>

<p>Paragraphs are separated
by a blank line.</p>

<p>Two spaces at the end of a line leave a<br />
line break.</p>

<p>Text attributes <em>italic</em>, <em>italic</em>, <strong>bold</strong>, <strong>bold</strong>, <code>monospace</code>.</p>

Horizontal rule:

<hr />

<p>Bullet list:</p>

<ul>
<li>apples</li>
<li>oranges</li>
<li>pears</li>
</ul>

<p>Numbered list:</p>

<ol>
<li>apples</li>
<li>oranges</li>
<li>pears</li>
</ol>

<p>A <a href="http://example.com">link</a>.</p>';

    /**
     * @var MarkdownParser
     */
    protected $markdownParser;

    public function setUp()
    {
        $this->markdownParser = new MarkdownParser();
        $this->markdownParser->setChunk(self::INPUT);
    }

    public function testParse()
    {
        $this->assertSame(self::OUTPUT, $this->markdownParser->parse()->getChunk());
    }
}
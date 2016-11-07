<?php

namespace TddCourse\Tests\MarkdownParser;

use TddCourse\MarkdownParser\MarkdownParser;

/**
 * Class MarkdownParserTest
 * @package TddCourse\Tests\MarkdownParser
 */
class MarkdownParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    const
        TEST_STRING = 'This **is** simple _[http://index.hu](link)_ and this is a picture ![http://r.ddmcdn.com/s_f/o_1/cx_633/cy_0/cw_1725/ch_1725/w_721/APL/uploads/2014/11/too-cute-doggone-it-video-playlist.jpg](of a dog).',
        EXPECTED = 'This <strong>is</strong> simple <i><a href="http://index.hu">link</a></i> and this is a picture <img src="http://r.ddmcdn.com/s_f/o_1/cx_633/cy_0/cw_1725/ch_1725/w_721/APL/uploads/2014/11/too-cute-doggone-it-video-playlist.jpg" alt="of a dog">.';

    /**
     * @var MarkdownParser
     */
    protected $parser;

    public function setUp()
    {
        $this->parser = new MarkdownParser();
    }

    public function testParsing()
    {
        $this->assertSame(self::EXPECTED, $this->parser->parse(self::TEST_STRING));
    }
}
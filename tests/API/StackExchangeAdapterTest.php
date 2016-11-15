<?php

namespace TddCourse\Tests\API;
use TddCourse\API\StackExchangeAdapter;
use TddCourse\API\StackExchangeAPI;

/**
 * Class StackExchangeAdapterTest
 * @package TddCourse\Tests\API
 */
class StackExchangeAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StackExchangeAdapter
     */
    protected $adapter;

    public function setUp()
    {
        $api = $this->getMockBuilder(StackExchangeAPI::class)->getMock();
        $featured = array(
            'response' => json_decode(file_get_contents(getcwd() . '/tests/API/fixtures/featured_question.json'))
        );
        $answers = array(
            'response' =>json_decode(file_get_contents(getcwd() . '/tests/API/fixtures/answers_on_question.json'))
        );

        $featured['code'] = $answers['code'] = 200;

        $api->method('getFeatured')->willReturn($featured);
        $api->method('getAnswersOnQuestion')->willReturn($answers);

        $this->adapter = new StackExchangeAdapter($api);
    }

    public function testMostPopularQuestion()
    {
        $result = $this->adapter->getMostPopular();

        $this->assertObjectHasAttribute('title', $result, "There is no title");
        $this->assertEquals('Example title', $result->title, "Not equal title");
        $this->assertObjectHasAttribute('question_id', $result, "There is no question id");
        $this->assertEquals(1, $result->question_id, "Not equal question ID");
    }

    public function testAnswersOnQuestion()
    {
        $questionId = 1;
        $result = $this->adapter->getAnswers($questionId);

        $this->assertInternalType('array', $result);
        $this->assertInstanceOf('stdClass', $result[0]);
        $this->assertInstanceOf('stdClass', $result[1]);
        $this->assertObjectHasAttribute('owner', $result[0]);
        $this->assertObjectHasAttribute('owner', $result[1]);
        $this->assertInstanceOf('stdClass', $result[0]->owner);
        $this->assertInstanceOf('stdClass', $result[1]->owner);
        $this->assertObjectHasAttribute('display_name', $result[0]->owner);
        $this->assertObjectHasAttribute('display_name', $result[1]->owner);
        $this->assertObjectHasAttribute('user_id', $result[0]->owner);
        $this->assertObjectHasAttribute('user_id', $result[1]->owner);
        $this->assertEquals('Test user 1', $result[0]->owner->display_name);
        $this->assertEquals('Test user 2', $result[1]->owner->display_name);
    }

    /**
     * @depends testAnswersOnQuestion
     */
    public function testAnswersUserIds()
    {
        $quetionId = 1;
        $result = $this->adapter->getAnswersUserIds($quetionId);

        $this->assertInternalType('array', $result);
        $this->assertEquals(1, $result[0]);
        $this->assertEquals(2, $result[1]);
    }
}
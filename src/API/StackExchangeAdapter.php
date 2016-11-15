<?php

namespace TddCourse\API;

/**
 * Class StackExchangeAdapter
 * @package TddCourse\API
 */
class StackExchangeAdapter
{
    /**
     * @var StackExchangeAPI
     */
    protected $api;

    /**
     * @var array
     */
    protected $baseModifiers;

    /**
     * StackExchangeAdapter constructor.
     *
     * @param StackExchangeAPI $api
     */
    public function __construct(StackExchangeAPI $api)
    {
        $this->api = $api;
        $this->baseModifiers = array(
            'order' => 'desc',
            'sort' => 'votes',
            'site' => 'stackoverflow'
        );
    }

    /**
     * @return \stdClass
     * @throws \Exception
     */
    public function getMostPopular()
    {
        $data = $this->api->getFeatured($this->baseModifiers);

        $result = $this->checkResponse($data);

        return $result->items[0];
    }

    /**
     * @param int $questionId
     * @return array
     */
    public function getAnswersUserIds($questionId)
    {
        $answers = $this->getAnswers($questionId);

        $result = array();
        foreach ($answers as $answer) {
            $result[] = $answer->owner->user_id;
        }

        return $result;
    }

    /**
     * @param int $questionId
     * @return array
     */
    public function getAnswers($questionId)
    {
        $data = $this->api->getAnswersOnQuestion($questionId, $this->baseModifiers);

        $result = $this->checkResponse($data);

        return $result->items;
    }

    /**
     * @param array $data
     * @return \stdClass
     * @throws \Exception
     */
    private function checkResponse($data)
    {
        if ($data["code"] !== 200) {
            throw new \Exception('Bad response code: ' . $data['code']);
        }

        return $data['response'];
    }
}
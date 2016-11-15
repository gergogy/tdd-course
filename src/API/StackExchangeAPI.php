<?php

namespace TddCourse\API;

/**
 * Class StackExchangeAPI
 * @package TddCourse\API
 */
class StackExchangeAPI
{
    /**
     * @var string
     */
    const BASE_URL = 'http://api.stackexchange.com/2.2/questions/';

    /**
     * @param $modifiers
     * @return array
     */
    public function getFeatured(array $modifiers)
    {
        $link = self::BASE_URL . 'featured' . $this->builQueryString($modifiers);

        return $this->getResponse($link);
    }

    /**
     * @param int $questionId
     * @param array $modifiers
     * @return array
     */
    public function getAnswersOnQuestion($questionId, array $modifiers)
    {
        $link = self::BASE_URL . $questionId . '/answers' . $this->builQueryString($modifiers);

        return $this->getResponse($link);
    }

    /**
     * @param array $modifiers
     * @return string
     */
    private function builQueryString(array $modifiers)
    {
        $query = '';
        $first = true;

        foreach ($modifiers as $key => $value) {
            if ($first) {
                $query .= '?' . $key . '=' . $value;
                $first = false;
            } else {
                $query .= '&' . $key . '=' . $value;
            }
        }

        return $query;
    }

    /**
     * @param string $link
     * @return array
     */
    private function getResponse($link)
    {
        $resource = curl_init();

        curl_setopt($resource, CURLOPT_HEADER, 0);
        curl_setopt($resource, CURLOPT_TIMEOUT, 5);
        curl_setopt($resource, CURLOPT_URL, $link);
        curl_setopt($resource, CURLOPT_ENCODING , "gzip");
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($resource);
        $httpCode = curl_getinfo($resource, CURLINFO_HTTP_CODE);

        curl_close($resource);

        return array(
            'code' => $httpCode,
            'response' => json_decode($response)
        );
    }
}

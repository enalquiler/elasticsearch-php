<?php

namespace Enalquiler\Elasticsearch\Endpoints\Indices;

use Enalquiler\Elasticsearch\Common\Exceptions;
use Enalquiler\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Analyze
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Analyze extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $uri = "/_analyze";

        if (isset($index) === true) {
            $uri = "/$index/_analyze";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'analyzer',
            'char_filters',
            'char_filter',
            'field',
            'filters',
            'filter',
            'index',
            'prefer_local',
            'text',
            'tokenizer',
            'explain',
            'attributes',
            'format',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}

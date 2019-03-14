<?php

namespace Enalquiler\Elasticsearch\Endpoints\Indices;

use Enalquiler\Elasticsearch\Common\Exceptions;
use Enalquiler\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Seal
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Seal extends AbstractEndpoint
{
    /**
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $uri = "/_seal";

        if (isset($index) === true) {
            $uri = "/$index/_seal";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}

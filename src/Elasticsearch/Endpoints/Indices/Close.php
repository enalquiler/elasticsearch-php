<?php

namespace Enalquiler\Elasticsearch\Endpoints\Indices;

use Enalquiler\Elasticsearch\Common\Exceptions;
use Enalquiler\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Close
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Close extends AbstractEndpoint
{
    /**
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Close'
            );
        }
        $index = $this->index;
        $uri = "/$index/_close";

        if (isset($index) === true) {
            $uri = "/$index/_close";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'timeout',
            'master_timeout',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}

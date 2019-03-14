<?php

namespace Enalquiler\Elasticsearch\Endpoints\Cluster;

use Enalquiler\Elasticsearch\Common\Exceptions;
use Enalquiler\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Reroute
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Reroute extends AbstractEndpoint
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
        $uri = "/_cluster/reroute";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'dry_run',
            'filter_metadata',
            'explain',
            'metric',
            'master_timeout',
            'timeout',
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

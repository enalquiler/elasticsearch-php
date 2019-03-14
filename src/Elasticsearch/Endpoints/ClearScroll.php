<?php

namespace Enalquiler\Elasticsearch\Endpoints;

use Enalquiler\Elasticsearch\Common\Exceptions;

/**
 * Class Clearscroll
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class ClearScroll extends AbstractEndpoint
{
    // A comma-separated list of scroll IDs to clear
    private $scroll_id;

    /**
     * @param $scroll_id
     *
     * @return $this
     */
    public function setScrollId($scroll_id)
    {
        if (isset($scroll_id) !== true) {
            return $this;
        }

        $this->scroll_id = $scroll_id;

        return $this;
    }

    /**
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->scroll_id) !== true) {
            throw new Exceptions\RuntimeException(
                'scroll_id is required for Clearscroll'
            );
        }
        $scroll_id = $this->scroll_id;
        $uri = "/_search/scroll/$scroll_id";

        if (isset($scroll_id) === true) {
            $uri = "/_search/scroll/$scroll_id";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'DELETE';
    }
}

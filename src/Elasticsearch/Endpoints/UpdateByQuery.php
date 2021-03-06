<?php

namespace Enalquiler\Elasticsearch\Endpoints;

use Enalquiler\Elasticsearch\Common\Exceptions;

/**
 * Class UpdateByQuery
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints *
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class UpdateByQuery extends AbstractEndpoint
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

        if (is_array($body) !== true) {
            throw new Exceptions\InvalidArgumentException(
                'Body must be an array'
            );
        }
        $this->body = $body;

        return $this;
    }


    /**
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\BadMethodCallException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for UpdateByQuery'
            );
        }
        $index = $this->index;
        $type = $this->type;
        $uri = "/$index/_update_by_query";
        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_update_by_query";
        }
        if (isset($index) === true) {
            $uri = "/$index/_update_by_query";
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
            'analyze_wildcard',
            'default_operator',
            'df',
            'explain',
            'fields',
            'fielddata_fields',
            'from',
            'ignore_unavailable',
            'allow_no_indices',
            'conflicts',
            'expand_wildcards',
            'lenient',
            'lowercase_expanded_terms',
            'preference',
            'q',
            'routing',
            'scroll',
            'search_type',
            'search_timeout',
            'size',
            'sort',
            '_source',
            '_source_exclude',
            '_source_include',
            'terminate_after',
            'stats',
            'suggest_field',
            'suggest_mode',
            'suggest_size',
            'suggest_text',
            'timeout',
            'track_scores',
            'version',
            'version_type',
            'request_cache',
            'refresh',
            'consistency',
            'scroll_size',
            'wait_for_completion',
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

<?php

namespace Enalquiler\Elasticsearch\Endpoints;

use Enalquiler\Elasticsearch\Common\Exceptions;

/**
 * Class Index
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Index extends AbstractEndpoint
{
    /** @var bool */
    private $createIfAbsent = false;

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
     * @return $this
     */
    public function createIfAbsent()
    {
        $this->createIfAbsent = true;

        return $this;
    }

    /**
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Index'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Index'
            );
        }

        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri = "/$index/$type";

        if (isset($id) === true) {
            $uri = "/$index/$type/$id";
        }

        if ($this->createIfAbsent === true) {
            $uri .= $this->addCreateFlag();
        }

        return $uri;
    }

    private function addCreateFlag()
    {
        if (isset($this->id) === true) {
            return '/_create';
        } else {
            $this->params['op_type'] = 'create';

            return "";
        }
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'consistency',
            'op_type',
            'parent',
            'refresh',
            'routing',
            'timeout',
            'timestamp',
            'ttl',
            'version',
            'version_type',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        if (isset($this->id) === true) {
            return 'PUT';
        } else {
            return 'POST';
        }
    }

    /**
     * @return array
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Document body must be set for index request');
        } else {
            return $this->body;
        }
    }
}

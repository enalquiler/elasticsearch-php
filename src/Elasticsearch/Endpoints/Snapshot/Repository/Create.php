<?php

namespace Enalquiler\Elasticsearch\Endpoints\Snapshot\Repository;

use Enalquiler\Elasticsearch\Common\Exceptions;
use Enalquiler\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Create
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot\Repository
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Create extends AbstractEndpoint
{
    // A repository name
    private $repository;

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
     * @param $repository
     *
     * @return $this
     */
    public function setRepository($repository)
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;

        return $this;
    }

    /**
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Create'
            );
        }
        $repository = $this->repository;
        $uri = "/_snapshot/$repository";

        if (isset($repository) === true) {
            $uri = "/_snapshot/$repository";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'master_timeout',
            'timeout',
            'verify',
        ];
    }

    /**
     * @return array
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Create Repository');
        }

        return $this->body;
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'PUT';
    }
}

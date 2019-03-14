<?php

namespace Enalquiler\Elasticsearch\ConnectionPool;

use Enalquiler\Elasticsearch\ConnectionPool\Selectors\SelectorInterface;
use Enalquiler\Elasticsearch\Connections\Connection;
use Enalquiler\Elasticsearch\Connections\ConnectionFactoryInterface;

class SimpleConnectionPool extends AbstractConnectionPool implements ConnectionPoolInterface
{

    /**
     * {@inheritdoc}
     */
    public function __construct($connections, SelectorInterface $selector, ConnectionFactoryInterface $factory, $connectionPoolParams)
    {
        parent::__construct($connections, $selector, $factory, $connectionPoolParams);
    }

    /**
     * @param bool $force
     *
     * @return Connection
     * @throws \Enalquiler\Elasticsearch\\Common\Exceptions\NoNodesAvailableException
     */
    public function nextConnection($force = false)
    {
        return $this->selector->select($this->connections);
    }

    public function scheduleCheck()
    {
    }

}

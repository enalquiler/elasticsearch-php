<?php

namespace Enalquiler\Elasticsearch\Common\Exceptions\Curl;

use Enalquiler\Elasticsearch\Common\Exceptions\ElasticsearchException;
use Enalquiler\Elasticsearch\Common\Exceptions\TransportException;

/**
 * Class OperationTimeoutException
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Common\Exceptions\Curl
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
  */
class OperationTimeoutException extends TransportException implements ElasticsearchException
{
}

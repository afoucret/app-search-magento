<?php
/*
 * This file is part of the App Search Magento module.
 *
 * (c) Elastic
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elastic\AppSearch\SearchAdapter\RequestExecutor\Response;

use Magento\Framework\Search\RequestInterface;

/**
 * Apply a list of processor to the response.
 *
 * @package   Elastic\AppSearch\SearchAdapter\RequestExecutor\Response
 * @copyright 2019 Elastic
 * @license   Open Software License ("OSL") v. 3.0
 */
class Processor implements ProcessorInterface
{
    /**
     * @var ProcessorInterface[]
     */
    private $processors;

    /**
     * Constructor.
     *
     * @param ProcessorInterface[] $processors
     */
    public function __construct(array $processors = [])
    {
        $this->processors = $processors;
    }

    /**
     * {@inheritDoc}
     */
    public function process(RequestInterface $request, array $response): array
    {
        foreach ($this->processors as $processor) {
            $response = $processor->process($request, $response);
        }

        return $response;
    }
}

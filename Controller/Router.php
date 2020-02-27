<?php

namespace Boangri\Ololo\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

/**
 * Class Router
 * @package Boangri\Ololo\Controller
 */
class Router implements RouterInterface
{
    public $actions = ['ololo', 'services', 'contacts', 'portfolio'];
    /**
     * @var ActionFactory
     */
    private $actionFactory;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    public function __construct(
        ActionFactory $actionFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->actionFactory = $actionFactory;
        $this->logger = $logger;
    }
    public function match(RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');
        if (in_array($identifier, $this->actions)) {
            $identifier = ($identifier === 'ololo') ? 'index' : $identifier;
            $request->setModuleName('ololo')->setControllerName($identifier)->setActionName('index');
            $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);
            $this->logger->info("Matched: {$identifier}");
            return $this->actionFactory->create(Forward::class);
        }
        $this->logger->info("Not matched: {$identifier}");
        return null;
    }
}

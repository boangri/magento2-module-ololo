<?php

namespace Boangri\Ololo\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Router
 * @package Boangri\Ololo\Controller
 */
class Router implements RouterInterface
{
    public $actions; //= ['ololo', 'services', 'contacts', 'portfolio'];
    /**
     * @var ActionFactory
     */
    private $actionFactory;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    public function __construct(
        ActionFactory $actionFactory,
        \Psr\Log\LoggerInterface $logger,
        StoreManagerInterface $storeManager,
        array $actions
    ) {
        $this->actionFactory = $actionFactory;
        $this->logger = $logger;
        $this->actions = $actions;
        $this->storeManager = $storeManager;
    }

    public function match(RequestInterface $request)
    {
        $code = $this->storeManager->getStore()->getCode();
        if ($code !== 'ololo') {
            return null;
        }
        $identifier = trim($request->getPathInfo(), '/');
        $identifier = $identifier ?? 'index';
        if (in_array($identifier, $this->actions)) {
            $request->setModuleName('ololo')->setControllerName($identifier)->setActionName('index');
            $request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);
            $this->logger->info("Matched: {$identifier}");
            return $this->actionFactory->create(Forward::class);
        }
        $this->logger->info("Not matched: {$identifier}");
        return null;
    }
}


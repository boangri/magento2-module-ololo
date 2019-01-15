<?php

namespace Boangri\Ololo\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Boangri\Ololo\Model\ResourceModel\Portfolio\Collection as PortfolioCollection;
use \Boangri\Ololo\Model\ResourceModel\Portfolio\CollectionFactory as PortfolioCollectionFactory;
//use \Boangri\Ololo\Model\Portfolio;

class Portfolio extends Template
{
    /**
     * CollectionFactory
     * @var null|CollectionFactory
     */
    protected $_postCollectionFactory = null;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PortfolioCollectionFactory $portfolioCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        PortfolioCollectionFactory $portfolioCollectionFactory,
        array $data = []
    ) {
        $this->_portfolioCollectionFactory = $portfolioCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return Items[]
     */
    public function getProjects()
    {
        /** @var PortfolioCollection $portfolioCollection */
        $portfolioCollection = $this->_portfolioCollectionFactory->create();
        $portfolioCollection->addFieldToSelect('*')->load();
        return $portfolioCollection->getItems();
    }
}

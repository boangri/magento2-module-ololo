<?php declare(strict_types=1);

namespace Boangri\Ololo\ViewModel;

use Boangri\Ololo\Model\ResourceModel\Portfolio\Collection as PortfolioCollection;
use Boangri\Ololo\Model\ResourceModel\Portfolio\CollectionFactory as PortfolioCollectionFactory;
use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Portfolio implements ArgumentInterface
{
    /**
     * @var PortfolioCollectionFactory|null
     */
    protected $portfolioCollectionFactory = null;

    /**
     * Portfolio constructor.
     * @param PortfolioCollectionFactory $portfolioCollectionFactory
     */
    public function __construct(
        PortfolioCollectionFactory $portfolioCollectionFactory
    ) {
        $this->portfolioCollectionFactory = $portfolioCollectionFactory;
    }

    /**
     * @return DataObject[]
     */
    public function getProjects()
    {
        /** @var PortfolioCollection $portfolioCollection */
        $portfolioCollection = $this->portfolioCollectionFactory->create();
        return $portfolioCollection->getItems();
    }
}

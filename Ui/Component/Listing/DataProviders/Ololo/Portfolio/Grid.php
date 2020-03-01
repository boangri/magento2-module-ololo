<?php
namespace Boangri\Ololo\Ui\Component\Listing\DataProviders\Ololo\Portfolio;


/**
 * Class Grid
 */
class Grid extends \Magento\Ui\DataProvider\AbstractDataProvider
{    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Boangri\Ololo\Model\ResourceModel\Portfolio\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
}

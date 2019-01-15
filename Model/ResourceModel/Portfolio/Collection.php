<?php
namespace Boangri\Ololo\Model\ResourceModel\Portfolio;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Remittance File Collection Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Boangri\Ololo\Model\Portfolio', 'Boangri\Ololo\Model\ResourceModel\Portfolio');
    }
}

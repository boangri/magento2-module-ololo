<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Boangri\Ololo\Setup\Patch\Data;

use Exception;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\StoreFactory;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class CreateStoreView implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;
    /**
     * @var StoreFactory
     */
    private $storeFactory;
    /**
     * @var CreateStore
     */
    private $createStore;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param StoreFactory $storeFactory
     * @param CreateStore $createStore
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        StoreFactory $storeFactory,
        CreateStore $createStore
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->storeFactory = $storeFactory;
        $this->createStore = $createStore;
    }

    /**
     * Do Upgrade
     *
     * @return void
     * @throws LocalizedException
     * @throws Exception
     */
    public function apply()
    {
        $websiteId = $this->createStore->getWebsiteId('ololo');
        $groupId = $this->createStore->getGroupId();
        $store = $this->storeFactory->create();
        $store->load('ololo', 'code');
        $store->setName('Ololo - Store View');
        $store->setCode('ololo');
        $store->setWebsiteId($websiteId);
        $store->setGroupId($groupId);
        $store->setIsActive(true);
        $store->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [
            CreateStore::class
        ];
    }
}

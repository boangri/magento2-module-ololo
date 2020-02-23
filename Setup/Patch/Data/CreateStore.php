<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Boangri\Ololo\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\GroupFactory;
use Magento\Store\Model\WebsiteFactory;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class CreateStore implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;
    /**
     * @var WebsiteFactory
     */
    private $websiteFactory;
    /**
     * @var GroupFactory
     */
    private $groupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param WebsiteFactory $websiteFactory
     * @param GroupFactory $groupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        WebsiteFactory $websiteFactory,
        GroupFactory $groupFactory

    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->websiteFactory = $websiteFactory;
        $this->groupFactory = $groupFactory;
    }

    protected function getWebsiteId($code)
    {
        $website = $this->websiteFactory->create()->load($code, 'code');
        return $website->getId();
    }

    /**
     * Do Upgrade
     *
     * @return void
     * @throws \Exception
     */
    public function apply()
    {
        $websiteId = $this->getWebsiteId('ololo');
        $group = $this->groupFactory->create();
        $group->setWebsiteId($websiteId);
        $group->setName('Ololo Store');
        $group->setCode('ololo');
        $group->save();
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
            CreateWebsite::class
        ];
    }
}

<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Boangri\Ololo\Setup\Patch\Data;

use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\WebsiteFactory;
use Magento\Store\Model\ResourceModel\Website as ResourceModel;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class CreateWebsite implements DataPatchInterface
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
     * @var ResourceModel
     */
    private $websiteResourceModel;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param WebsiteFactory $websiteFactory
     * @param ResourceModel $websiteResourceModel
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        WebsiteFactory $websiteFactory,
        ResourceModel $websiteResourceModel

    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->websiteFactory = $websiteFactory;
        $this->websiteResourceModel = $websiteResourceModel;
    }

    /**
     * Do Upgrade
     *
     * @return void
     * @throws AlreadyExistsException
     */
    public function apply()
    {
        $website = $this->websiteFactory->create();
        $website->load('ololo');
        if (!$website->getId()) {
            $website->setCode('ololo');
            $website->setName('Ololo Website');
            $this->websiteResourceModel->save($website);
        }
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

        ];
    }
}

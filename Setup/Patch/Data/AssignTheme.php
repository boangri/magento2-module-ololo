<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Boangri\Ololo\Setup\Patch\Data;

use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Theme\Model\ThemeFactory;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class AssignTheme implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;
    /**
     * @var ConfigInterface
     */
    private $configInterface;
    /**
     * @var CreateStoreView
     */
    private $createStoreView;
    /**
     * @var ThemeFactory
     */
    private $themeFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param ConfigInterface $configInterface
     * @param CreateStoreView $createStoreView
     * @param ThemeFactory $themeFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        ConfigInterface $configInterface,
        CreateStoreView $createStoreView,
        ThemeFactory $themeFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->configInterface = $configInterface;
        $this->createStoreView = $createStoreView;
        $this->themeFactory = $themeFactory;
    }

    /**
     * Do Upgrade
     *
     * @return void
     * @throws LocalizedException
     */
    public function apply()
    {
        $storeId = $this->createStoreView->getStoreId();
        $theme = $this->themeFactory->create()->load('Boangri/ololo', 'code');
        $themeId = $theme->getId();
        $this->configInterface->saveConfig('design/theme/theme_id', $themeId, 'stores', $storeId);
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
            CreateStoreView::class
        ];
    }
}

<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Boangri\Ololo\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class PopulatePortfolio implements DataPatchInterface
{
    private $data = [
                [
                    'year' => '2012',
                    'site' => 'http://DunkelBeer.ru',
                    'description' => 'Промо-сайт темного пива Dunkel от немецкого производителя Löwenbraü выпускаемого в России пивоваренной компанией "CАН ИнБев".'
                ],
                [
                    'year' => '2012',
                    'site' => 'http://ZopoMobile.ru',
                    'description' => 'Русскоязычный каталог китайских телефонов компании Zopo на базе Android OS и аксессуаров к ним.'
                ],
                [
                    'year' => '2012',
                    'site' => 'http://GeekWear.ru',
                    'description' => 'Интернет-магазин брендовой одежды для гиков.'
                ],
                [
                    'year' => '2011',
                    'site' => 'http://РоналВарвар.рф',
                    'description' => 'Промо-сайт мультфильма "Ронал-варвар" от норвежских режиссеров. Мультфильм о самом нетипичном варваре на Земле, переполненный интересными приключениями и забавными ситуациями.'
                ],
                [
                    'year' => '2011',
                    'site' => 'http://TompsonTatoo.ru',
                    'description' => 'Персональный сайт-блог художника-татуировщика Алексея Томпсона из Санкт-Петербурга.'
                ],
                [
                    'year' => '2011',
                    'site' => 'http://DaftState.ru',
                    'description' => 'Страничка музыкальных и сануд продюсеров из команды "DaftState", работающих в стилях BreakBeat и BigBeat.'
                ],
                [
                    'year' => '2011',
                    'site' => 'http://TiltPeople.ru',
                    'description' => 'Сайт сообщества фотографов в стиле Tilt Shif.'
                ],
                [
                    'year' => '2011',
                    'site' => 'http://AbsurdGames.ru',
                    'description' => 'Страничка российской команды разработчиков независимых игр с необычной физикой и сюрреалистической графикой.'
                ],
            ];

    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->insertMultiple('boangri_portfolio', $this->data);
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

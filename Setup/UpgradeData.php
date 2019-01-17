<?php

namespace Boangri\Ololo\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 *
 * @package Boangri\Ololo\Setup
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * Creates portfolio
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.1.4') < 0
        ) {
            $tableName = $setup->getTable('boangri_portfolio');

            $data = [
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

            $setup
                ->getConnection()
                ->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}

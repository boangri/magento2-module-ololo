<?php

namespace Boangri\Ololo\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 *
 * @package Boangri\Ololo\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install `Portfolio` table
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('boangri_portfolio');

        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'year',
                    Table::TYPE_TEXT,
                    4,
                    ['nullable' => false],
                    'Year'
                )
                ->addColumn(
                    'site',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Site'
                )
                ->addColumn(
                    'description',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Description'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Created At'
                )
                ->setComment('Boangri Ololo - Portfolio');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}

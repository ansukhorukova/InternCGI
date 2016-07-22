<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('blog/products'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 255, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
    ))
    ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 255, array(
        'unsigned' => true,
        'nullable' => false,
    ))
    ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 255, array(
        'unsigned' => true,
        'nullable'  => false,
    ));

$installer->getConnection()->createTable($table);

$installer->getConnection()->addForeignKey(
    $installer->getFkName('blog/products', 'post_id', 'blog/articles', 'blogpost_id'),
    $installer->getTable('blog/products'), 'post_id',
    $installer->getTable('blog/articles'), 'blogpost_id');

$installer->getConnection()->addForeignKey(
    $installer->getFkName('blog/products', 'product_id', 'blog/catalog', 'entity_id'),
    $installer->getTable('blog/products'), 'product_id',
    $installer->getTable('blog/catalog'), 'entity_id');

$installer->endSetup();
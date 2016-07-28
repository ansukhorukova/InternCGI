<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('blog/articles'))
    ->addColumn('blogpost_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 255, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
    ))
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
    ))
    ->addColumn('author_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 255, array(
        'nullable'  => false,
    ))
    ->addColumn('post', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => true,
    ))
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_VARCHAR, 2, array(
        'nullable'  => false,
    ))
    ->addColumn('date', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_UPDATE
    ));

$installer->getConnection()->createTable($table);

$installer->getConnection()->addForeignKey(
    $installer->getFkName('blog/articles', 'author_id', 'blog/customer', 'entity_id'),
    $installer->getTable('blog/articles'), 'author_id',
    $installer->getTable('blog/customer'), 'entity_id');

$installer->endSetup();
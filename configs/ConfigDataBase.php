<?php

namespace  configs;

class ConfigDataBase
{
   public static $configPdoDataBase = array(
                                         'dsn' => 'mysql:dbname=test;host=127.0.0.1',
                                         'name' => 'pdo', 'password' => 'test_pdo',
                                         'options' => array()
                                          );
}

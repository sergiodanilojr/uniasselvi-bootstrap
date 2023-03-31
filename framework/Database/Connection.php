<?php

namespace Framework\Database;

use Framework\Support\Config;

class Connection
{

    private static $instance;

    private static $driver = 'mysql';

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {

            self::$instance = new \PDO(
                self::dns(),
                self::username(),
                self::password(),
                self::options()
            );
        }

        return self::$instance;
    }

    private static function loadConfigs()
    {
        $config = new Config;

        return $config->load('database')['drivers'][self::$driver];
    }

    private static function dns()
    {
        $configs = self::loadConfigs();

        $configs['port'] = $configs['port'] ?? '3306';

        return self::$driver . ":host={$configs['host']};dbname={$configs['database']};port={$configs['port']}";
    }

    private static function username()
    {
        return self::loadConfigs()['username'];
    }

    private static function password()
    {
        return self::loadConfigs()['password'];
    }
    
    private static function options()
    {
        return !empty(self::loadConfigs()['options'])
            ? self::loadConfigs()['options']
            : null;
    }
}

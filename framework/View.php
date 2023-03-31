<?php

namespace Framework;

use Framework\Support\Config;

class View
{
    public static function init()
    {
        $configs = self::loadConfig();
        $templates = new \League\Plates\Engine($configs['base_dir']);

        foreach($configs['templates'] as $module => $path){
            $templates->addFolder($module, $configs['base_dir'] . $path);
        }

        return $templates;
    }

    protected static function loadConfig(): array
    {
        return (new Config)->load('view');
    }
}

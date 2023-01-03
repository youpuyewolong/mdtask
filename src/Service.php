<?php

namespace wxlmd\mdtask\src;

use think\helper\Arr;
use think\helper\Str;
use think\Queue;
use think\queue\command\Table;


class Service extends \think\Service
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->commands([
            Table::class
        ]);
    }
}

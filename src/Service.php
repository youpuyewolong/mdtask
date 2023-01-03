<?php

namespace mdtask;

use think\helper\Arr;
use think\helper\Str;
use think\Queue;
use mdtask\command\Table;


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

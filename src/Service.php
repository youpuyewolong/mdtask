<?php

namespace mdtask;


use mdtask\command\Listen;
use mdtask\command\Table;
use mdtask\command\ServiceFile;

class Service extends \think\Service
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->commands([
            Table::class,
            ServiceFile::class,
            Listen::class
        ]);
    }
}

<?php

namespace mdtask\command;

use think\console\Command;
use think\helper\Str;
use think\migration\Creator;

class ServiceFile extends Command
{
    protected function configure()
    {
        $this->setName('mdtask:create')
            ->addArgument('name', Argument::OPTIONAL, "service name")
            ->setDescription('Create Task ServiceFile File');
    }

    public function handle()
    {
        $name = trim($this->input->getArgument('name'));
        $name = $name ?: time();
        $name = ucfirst($name).".php";

        $namespace = $this->app->config->get('task.service_path');
        $namespace = strtr($namespace,"/","\\");
        // Load the alternative template if it is defined.
        $contents = file_get_contents(__DIR__ . '/stubs/taskservice.stub');

        // inject the class names appropriate to this migration
        $contents = strtr($contents, [
            'ServiceName' => $name,
            'namespace' => $namespace
        ]);
        $path = $this->app->config->get('task.service_path');
        file_put_contents($path, $contents);

        $this->output->info('ServiceFile created successfully!');
    }
}

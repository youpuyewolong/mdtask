<?php

namespace mdtask;

use mdtask\job\CommonJob;
use think\facade\Db;
use think\facade\Queue;

class Task
{

    public function add_task($task_name,$create_by){
        $table = app()->config->get('task.table');
        $insert['task_name'] = $task_name;
        $insert['status'] = 1;
        $insert['create_by'] = $create_by;
        $task_id = Db::name($table)->insertGetId($insert);
        return $task_id;
    }
    public function task_now($task_name,$create_by,$param){
        $namespace = $this->get_namespace();
        $task_id = $this->add_task($task_name,$create_by);
        Queue::push(CommonJob::class, ['namespace'=>$namespace,'task_id'=>$task_id,'param'=>$param], $queue = $this->app->config->get('task.queue_name'));
    }

    public function task_later($later,$task_name,$create_by,$param){
        $namespace = $this->get_namespace();
        $task_id = $this->add_task($task_name,$create_by);
        Queue::later($later,CommonJob::class, ['namespace'=>$namespace,'task_id'=>$task_id,'param'=>$param], $queue = $this->app->config->get('task.queue_name'));
    }

    public function get_namespace(){
        $namespace = app()->config->get('task.service_path');
        return strtr($namespace,"/","\\");
    }
}
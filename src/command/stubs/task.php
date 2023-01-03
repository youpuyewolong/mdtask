<?php

use think\migration\db\Column;
use think\migration\Migrator;

class CreateTaskTable extends Migrator
{
    public function change()
    {
        $this->table('tp_task')
            ->addColumn('task_name','string',['limit'=>255,'comment'=>'任务名称'])
            ->addColumn('status','integer',['limit'=>1,'comment'=>'任务状态'])
            ->addColumn('create_time','datetime',['comment'=>'创建时间'])
            ->addColumn('update_time','datetime',['comment'=>'更新时间'])
            ->addColumn('delete_time','datetime',['comment'=>'删除时间'])
            ->addColumn('result','string',['limit'=>255,'comment'=>'任务结果'])
            ->addColumn('create_by','string',['comment'=>'任务创建人'])
            ->setPrimaryKey('id')
            ->create();
    }
}

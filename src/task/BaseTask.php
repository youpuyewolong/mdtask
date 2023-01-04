<?php

namespace mdtask\task;

use mdtask\model\Task;
class BaseTask{

    protected $task = null;

    public function do_task($task_id,$param){

        $this->task = Task::find($task_id);
        try {
            $res = $this->do_task_handle($param);
            $status = 3;
        }catch (\Exception $e){
            $res = '任务执行出错';
            $status = 4;
        }

        $this->task->save(['status'=>$status,'result'=>$res]);
    }

    protected function do_task_handle($param){
        return '任务执行完成';
    }


}

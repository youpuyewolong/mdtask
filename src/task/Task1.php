<?php

namespace app\task;

use think\queue\Job;
class Task1 extends BaseTask {

    protected function do_task_handle($param){
        echo "真正处理业务逻辑的地方".PHP_EOL;
        dump($param);
        return 'ok';
    }
}

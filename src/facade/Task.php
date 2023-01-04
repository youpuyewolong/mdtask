<?php

declare (strict_types = 1);

namespace mdtask\facade;


use think\Facade;
/**
 * @see \mdtask\Service
 * @package think\facade
 * @method static mixed task_now(string $task_name,string $create_by,array $param) 立即执行的任务
 * @method static mixed task_later(int $later,string $task_name,string $create_by,array $param) 延时执行的任务
 */

class Task extends Facade
{
    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
     * @access protected
     * @return string
     */
    protected static function getFacadeClass()
    {
        return 'mdtask\Task';
    }
}

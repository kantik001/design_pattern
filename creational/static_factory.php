<?php

interface Worker
{
    public function work();
}
class Boss implements Worker
{
    public function work()
    {
        printf('I`m Boss');
    }
}

class Designer implements Worker
{
    public function work()
    {
        printf('I`m Designer');
    }
}

class WorkerFactory
{
    public static function make($workerTitle): ?Worker
    {
        $ClassName = strtoupper($workerTitle);

        if(class_exists($ClassName)) {
            return new $ClassName();
        }
        return null;
    }
}

$boss = WorkerFactory::make('boss');
$designer = WorkerFactory::make('designer');

$boss->work();
printf("\n");
$designer->work();
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
        printf('I`m designer');
    }
}

interface WorkerFactory
{
    public static function make();
}

class BossFactory implements WorkerFactory
{
    public static function make()
    {
        return new Boss();
    }
}

class DesignerFactory implements WorkerFactory
{
    public static function make()
    {
        return new Designer();
    }
}

$boss = BossFactory::make();
$designer = DesignerFactory::make();

$designer->work();
$boss->work();
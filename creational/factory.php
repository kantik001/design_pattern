<?php

/*
 * Паттерн проектирования Factory - это шаблон проектирования, который позволяет создавать объекты
 * без явного указания их классов. Вместо этого, вы создаете объект фабрики, который знает,
 * как создавать объекты определенного типа.

 * Паттерн Factory используется, когда вы хотите отделить процесс создания объекта от его использования.
 * Это позволяет упростить код и сделать его более гибким и расширяемым. Например, если у вас есть класс,
 * который управляет подключением к базе данных, вы можете использовать паттерн Factory, чтобы создать
 * разные типы подключений в зависимости от требований.
 * */

class Worker
{
    private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

class WorkerFactory
{
    public static function make()
    {
        return new Worker();
    }
}

$worker = WorkerFactory::make();
$worker->setName('Nina');

var_dump($worker->getName());
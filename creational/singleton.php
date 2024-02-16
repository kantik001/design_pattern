<?php

/*
 * Паттерн проектирования Singleton - это шаблон проектирования, который гарантирует,
 * что в программе будет только один экземпляр класса. Это означает, что если вы создаете
 * новый объект класса, который реализует паттерн Singleton, он будет ссылаться на тот же
 * экземпляр класса, что и все остальные объекты этого класса.
 * Паттерн Singleton используется для управления доступом к ресурсам, которые могут быть использованы
 * только одним объектом в программе. Например, если у вас есть класс, который управляет подключением к базе данных,
 * вы можете использовать паттерн Singleton, чтобы гарантировать, что только один объект этого класса будет иметь
 * доступ к базе данных.
 * */


final class Connection
{

    private static ?self $instance = null;
    private static string $name;

    /**
     * @return string
     */
    public static function getName(): string
    {
        return self::$name;
    }

    /**
     * @param string $name
     */
    public static function setName(string $name): void
    {
        self::$name = $name;
    }
    public static function getInstance(): self
    {
        if(self::$instance === null) {
            self::$instance = new self();

        }

        return self::$instance;
    }

}

$connection = Connection::getInstance();
$connection::setName('Laravel');

$connection2 = Connection::getInstance();

var_dump($connection2::getName());

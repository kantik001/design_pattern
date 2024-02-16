<?php
/*
 * Применяется в случаях:
    Когда программа должна быть независимой от процесса и типов создаваемых новых объектов.
    Когда необходимо создать семейства или группы взаимосвязанных объектов исключая возможность
    одновременного использования объектов из разных этих наборов в одном контексте.
   Плюсы:
    изолирует конкретные классы;
    упрощает замену семейств продуктов;
    гарантирует сочетаемость продуктов.
   Минусы:
    сложно добавить поддержку нового вида продуктов.
 */

interface AbstractFactory
{
    public static function makeBossWorker(): BossWorker;
    public static function makeDesignerWorker(): DesignerWorker;

}
interface BossWorker extends Worker {}
interface DesignerWorker extends Worker {}

interface Worker
{
    public static function work();
}

class NativeBossWorker implements BossWorker
{
    public static function work()
    {
        printf('Im Boss native');
    }
}

class NativeDesignerWorker implements DesignerWorker
{
    public static function work()
    {
        printf('Im Designer native');
    }
}

class OutsourceBossWorker implements BossWorker
{
    public static function work()
    {
        printf('Im Boss outsource');
    }
}

class OutsourceDesignerWorker implements DesignerWorker
{
    public static function work()
    {
        printf('Im Designer outsource');
    }
}

class NativeWorkerFactory implements AbstractFactory
{
    public static function makeBossWorker(): BossWorker
    {
        return new NativeBossWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new NativeDesignerWorker();
    }
}

class OutsourceWorkerFactory implements AbstractFactory
{
    public static function makeBossWorker(): BossWorker
    {
        return new OutsourceBossWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new OutsourceDesignerWorker();
    }
}

$bossNative = NativeWorkerFactory::makeBossWorker();
$designerNative = NativeWorkerFactory::makeDesignerWorker();

$bossOutsource = OutsourceWorkerFactory::makeBossWorker();
$designerOutsource = OutsourceWorkerFactory::makeDesignerWorker();

$bossNative->work();
$designerNative->work();
$bossOutsource->work();
$designerOutsource->work();
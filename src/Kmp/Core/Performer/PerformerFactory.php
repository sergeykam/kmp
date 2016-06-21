<?php

namespace Kmp\Core\Performer;

use Kmp\Entity\Provider;

/**
 * Фабрика перформеров - возвращает инициализированный объект перформера
 * Class PerformerFactory
 * @package Kmp\Core\Performer
 */
class PerformerFactory
{
    public static function get($name, Provider $Provider, $data)
    {
        $performer_class = "\\Kmp\\Core\\Performer\\" . ucfirst($name) . "Performer";

        if (class_exists($performer_class)) {
            return new $performer_class($Provider, $data);
        } else {
            throw new \Exception("Не найден перформер $performer_class");
        }
    }
}
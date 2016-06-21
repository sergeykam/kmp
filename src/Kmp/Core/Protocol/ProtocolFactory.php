<?php

namespace Kmp\Core\Protocol;

/**
 * Фабрика протоколов общения с веб сервисами
 * Class AbstractProtocolFactory
 * @package Kmp\Core\Protocol
 */
class ProtocolFactory
{
    /**
     * Возвращает инициализированный объект протокола
     * @param $name
     * @param $url
     * @return mixed
     * @throws \Exception
     */
    public static function getProtocol($name, $url)
    {
        $protocol_class = "\\Kmp\\Core\\Protocol\\" . ucfirst($name) . 'Protocol';

        if(class_exists($protocol_class)) {
            return new $protocol_class($url);
        } else {
            throw new \Exception("Протокол $name не поддерживается");
        }
    }
}
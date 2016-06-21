<?php

namespace Kmp\Core\Protocol;

/**
 * Реализация REST
 * заглушки возвращаемых данных удаленного веб сервиса
 * Class RESTProtocol
 * @package Kmp\Core\Protocol
 */
class RESTProtocol extends AbstractProtocol
{
    public function send($data)
    {
        // отправка данных через REST

        return true;
    }
}
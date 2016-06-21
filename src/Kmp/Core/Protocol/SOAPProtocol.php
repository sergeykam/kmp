<?php

namespace Kmp\Core\Protocol;

/**
 * Реализация SOAP
 * заглушки возвращаемых данных удаленного веб сервиса
 * Class RESTProtocol
 * @package Kmp\Core\Protocol
 */
class SOAPProtocol extends AbstractProtocol
{
    public function send($data)
    {
        // отправка данных через SOAP
        
        return true;
    }
}
<?php

namespace Kmp\Core\Protocol;

/**
 * Абстрактный класс реализации протокола
 * Class AbstractProtocol
 * @package Kmp\Core\Protocol
 */
abstract class AbstractProtocol
{
    protected $url;
    
    public function __construct($url)
    {
        $this->url = $url;
    }

    abstract public function send($data);
}
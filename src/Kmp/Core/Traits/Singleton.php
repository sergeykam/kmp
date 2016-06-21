<?php

namespace Kmp\Core\Traits;

trait Singleton {
    static private $instance;
    private function __construct() { /* ... @return Singleton */
    }
// Защищаем от создания через new Singleton
    private function __clone() { /* ... @return Singleton */
    }
// Защищаем от создания через клонирование
    private function __wakeup() { /* ... @return Singleton */
    }
// Защищаем от создания через unserialize
    static public function getInstance() {
        if (empty(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}
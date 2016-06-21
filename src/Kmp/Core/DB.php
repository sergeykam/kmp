<?php

namespace Kmp\Core;

use Kmp\Core\Traits\Singleton;

class DB
{
    use Singleton;
    /**
     * Подключение к БД
     * @var \PDO
     */
    static public $DBH = null;

    static public function connect()
    {
        try {
            DB::$DBH = new \PDO("mysql:host=localhost;dbname=KMP", "root", "password", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            throw $e;
        }
    }

    static public function close()
    {
        DB::$DBH = null;
    }
}
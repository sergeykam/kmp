<?php

namespace Kmp\Core;


class ProviderEmulatedData
{
    protected static $books = [
        '1' => [
            [
                'ID' => 2
                , 'name' => 'PHP и MySQL. Разработка Web-приложений'
                , 'author' => 'Денис Колисниченко'
                , 'ISBN' => '978-5-9775-0876-6'
                , 'pages' => '560'
            ]
            , [
                'ID' => 3
                , 'name' => 'PHP и MySQL. От новичка к профессионалу'
                , 'author' => 'Кевин Янк'
                , 'ISBN' => '978-5-699-67363-6'
                , 'pages' => '384'
            ]
        ]
        , '2' => [
            [
                'ID' => 2
                , 'name' => 'PHP и MySQL. Разработка Web-приложений'
                , 'author' => 'Денис Колисниченко'
                , 'ISBN' => '978-5-9775-0876-6'
                , 'pages' => '560'
            ]
        ]
    ];

    protected static $order_nums = [1 => '001', 2 => '002'];

    public static function search($provider_id)
    {
        return static::$books[$provider_id];
    }

    public static function getOrderNum($provider_id)
    {
        return static::$order_nums[$provider_id];
    }
}
<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// Подключение twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../src/Kmp/View'
));

$app["debug"] = true;
//$app["debug"] = false;

// Инициализация
try{
    // Подключение к БД
    Kmp\Core\DB::connect();
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}


// 0. главная страница
$app->get('/', 'Kmp\Controller\MainController::indexAction')->bind('homepage');

// 1. Получить перечень книг как результат  поиска  по названию, по автору, в том числе, по соавторам.
$app->get('/search', 'Kmp\Controller\MainController::searchAction')->bind('search');

// Корзина для формирования заказа
$app->get('/cart', 'Kmp\Controller\CartController::cartAction')->bind('cart');

// 2. Сформировать  заказ (передать ID книги по версии поставщика, передать количество, получить номер заказа поставщика)
$app->get('/cart/confirm', 'Kmp\Controller\CartController::confirmAction')->bind('confirm');

// 3. Оформить заказ
$app->get('/cart/order', 'Kmp\Controller\CartController::orderAction')->bind('order');

$app->run();
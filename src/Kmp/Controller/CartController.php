<?php

namespace Kmp\Controller;

use Silex\Application;

use Kmp\Model\ProviderRepository;
use Kmp\Core\Performer\PerformerFactory;

class CartController
{
    /**
     * Главная страница корзины
     * @param Application $app
     * @return mixed
     */
    public function cartAction(Application $app)
    {
        return $app['twig']->render('cart/cart.twig', array());
    }

    /**
     * 2. Сформировать  заказ (передать ID  книги по версии поставщика, передать количество, получить номер заказа поставщика)
     * @param Application $app
     */
    public function confirmAction(Application $app)
    {
        $ProviderRepository = new ProviderRepository();
        $ProviderCollection = $ProviderRepository->getAll();

        $result = [];

        foreach ($ProviderCollection as $Provider) {
            $ConcretePerformer = PerformerFactory::get("confirm", $Provider, ["id" => 1, "qnt" => 2]);
            $one_provider_result = $ConcretePerformer->perform();

            $result[] = $one_provider_result;
        }

        return $app['twig']->render('cart/confirm.twig', array(
            'order_nums' => implode(', ', $result)
        ));
    }

    /**
     * 3. Оформить заказ
     * @param Application $app
     */
    public function orderAction(Application $app)
    {
        $ProviderRepository = new ProviderRepository();
        $ProviderCollection = $ProviderRepository->getAll();

        foreach ($ProviderCollection as $Provider) {
            $ConcretePerformer = PerformerFactory::get("order", $Provider, []);
            $ConcretePerformer->perform();
        }

        return $app['twig']->render('cart/order.twig', []);
    }
}
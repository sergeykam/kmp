<?php

namespace Kmp\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use Kmp\Model\ProviderRepository;
use Kmp\Core\Performer\PerformerFactory;

class MainController
{
    /**
     * Главная страница
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Application $app)
    {
        return $app['twig']->render('index.twig');
    }

    /**
     * 1. Поиск по названию, по автору, в том числе, по соавторам.
     * @param Application $app
     * @param Request $request
     * @return mixed
     */
    public function searchAction(Application $app, Request $request)
    {
        $query = $request->get('query', '');
        
        $ProviderRepository = new ProviderRepository();
        $ProviderCollection = $ProviderRepository->getAll();

        $result = [];

        foreach ($ProviderCollection as $Provider) {
            $ConcretePerformer = PerformerFactory::get("search", $Provider, ["query" => $query]);
            $one_provider_result = $ConcretePerformer->perform();

            if(count($one_provider_result)){
                foreach ($one_provider_result as $item){
                    $result[] = $item;
                }
            }
        }

        return $app['twig']->render('index.twig', array(
            'query' => $query
            , 'items' => $result
        ));
    }
}
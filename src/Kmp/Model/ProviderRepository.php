<?php

namespace Kmp\Model;

use Kmp\Core\DB;
use Kmp\Entity\Provider;

class ProviderRepository
{
    /**
     * Возвращает всех поставщиков с типами
     * @return bool
     * @throws \Exception
     */
    public function getAll()
    {
        try {
            $query = "SELECT P.id, P.name, P.url, PT.name AS protocol FROM Provider AS P LEFT JOIN ProviderType AS PT ON PT.id=P.type_id WHERE 1";

            $sth = DB::$DBH->prepare($query);

            if ($sth->execute() === true) {
                $result = $sth->fetchAll();

                $collection = [];

                if(count($result)){
                    foreach ($result as $item){
                        $collection[] = new Provider($item);
                    }
                }
                return $collection;
            }
        } catch (\Exception $e) {
            throw $e;
        }
        return false;
    }
}
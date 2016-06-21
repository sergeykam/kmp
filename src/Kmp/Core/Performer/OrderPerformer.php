<?php

namespace Kmp\Core\Performer;

/**
 * Делает оформление заказов у поставщиков
 * Class OrderPerformer
 * @package Kmp\Core\Performer
 */
class OrderPerformer extends AbstractPerformer
{
    public function perform()
    {
        // подготовка запроса для отправки через протокол

        // отправляем данные через протокол
        $data = $this->Protocol->send($this->perform_data);

        // но возвращаем эмулированные данные
        return true;
    }
}
<?php

namespace Kmp\Core\Performer;

use Kmp\Core\ProviderEmulatedData;

/**
 * Делает подтверждение заказа в зависимости от провайдера
 * @package Kmp\Core\Performer
 */
class ConfirmPerformer extends AbstractPerformer
{
    public function perform()
    {
        // подготовка запроса для отправки через протокол

        // отправляем данные через протокол
        $data = $this->Protocol->send($this->perform_data);

        // но возвращаем эмулированные данные
        return ProviderEmulatedData::getOrderNum($this->Provider->getId());
    }
}
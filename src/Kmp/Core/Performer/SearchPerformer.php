<?php

namespace Kmp\Core\Performer;

use Kmp\Core\ProviderEmulatedData;

class SearchPerformer extends AbstractPerformer
{
    public function perform()
    {
        // подготовка запроса для отправки через протокол

        // отправляем данные через протокол
        $data = $this->Protocol->send($this->perform_data);
        
        // но возвращаем эмулированные данные
        return ProviderEmulatedData::search($this->Provider->getId());
    }
}
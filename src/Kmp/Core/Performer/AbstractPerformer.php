<?php

namespace Kmp\Core\Performer;

use Kmp\Entity\Provider;
use Kmp\Core\Protocol\ProtocolFactory;

abstract class AbstractPerformer
{
    protected $Provider;
    protected $perform_data;
    protected $Protocol;

    public function __construct(Provider $Provider, array $perform_data)
    {
        $this->Provider = $Provider;
        $this->Protocol = ProtocolFactory::getProtocol($Provider->getProtocol(), $Provider->getUrl());
        $this->perform_data = $perform_data;
    }

    abstract function perform();
}
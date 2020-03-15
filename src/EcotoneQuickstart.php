<?php

namespace App;

use Ecotone\Messaging\Conversion\MediaType;
use Ecotone\Modelling\CommandBus;
use Ecotone\Modelling\QueryBus;

class EcotoneQuickstart
{
    private CommandBus $commandBus;
    private QueryBus $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function run() : void
    {
        $orderId = 990;

        echo $this->queryBus->convertAndSend("order.getTotalPrice", MediaType::APPLICATION_X_PHP_ARRAY, ["orderId" => $orderId]);
    }
}
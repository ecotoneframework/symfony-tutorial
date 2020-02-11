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
        $this->commandBus->convertAndSend(
            "product.register",
            MediaType::APPLICATION_JSON,
            \json_encode(["productId" => 1, "cost" => 100])
        );
        $this->commandBus->convertAndSend(
            "product.register",
            MediaType::APPLICATION_JSON,
            \json_encode(["productId" => 2, "cost" => 300])
        );

        $this->commandBus->convertAndSend(
            "order.place",
            MediaType::APPLICATION_JSON,
            \json_encode(["orderId" => 1, "productIds" => [1,2]])
        );

        echo $this->queryBus->convertAndSend("product.getCost", MediaType::APPLICATION_JSON, \json_encode(["productId" => 1]));
    }
}
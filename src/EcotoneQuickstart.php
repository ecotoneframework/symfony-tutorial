<?php


namespace App;

use App\Domain\Product\GetProductPriceQuery;
use App\Domain\Product\RegisterProductCommand;
use Ecotone\Modelling\CommandBusWithEventPublishing;
use Ecotone\Modelling\QueryBus;

class EcotoneQuickstart
{
    private CommandBusWithEventPublishing $commandBus;
    private QueryBus $queryBus;

    public function __construct(CommandBusWithEventPublishing $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function run() : void
    {
        $this->commandBus->send(new RegisterProductCommand(1, 100));

        echo $this->queryBus->send(new GetProductPriceQuery(1));
    }
}
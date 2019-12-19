<?php


namespace App;

use Ecotone\Modelling\CommandBus;
use Ecotone\Modelling\QueryBus;
use PHPUnit\Framework\Assert;

class EcotoneQuickstart
{
    /**
     * @var CommandBus
     */
    private $commandBus;
    /**
     * @var QueryBus
     */
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function run() : void
    {
        $productId = 1;
        $cost = 10;

        $this->commandBus->send(new RegisterProductCommand($productId, "egg", $cost));
        Assert::assertEquals(
            100,
            $this->queryBus->send(new GetProductCostQuery($productId, 10))
        );
    }
}
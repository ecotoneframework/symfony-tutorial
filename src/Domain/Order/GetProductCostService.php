<?php

namespace App\Domain\Order;

use Ecotone\Messaging\Conversion\MediaType;
use Ecotone\Modelling\QueryBus;

class GetProductCostService
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function getBy(int $productId) : int
    {
        return $this->queryBus->convertAndSend($productId, MediaType::APPLICATION_X_PHP, ["productId" => $productId])->getAmount();
    }
}
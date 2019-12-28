<?php

namespace App\Domain\Product;

use Ecotone\Messaging\Annotation\MessageEndpoint;
use Ecotone\Modelling\Annotation\CommandHandler;
use Ecotone\Modelling\Annotation\QueryHandler;

/**
 * @MessageEndpoint()
 */
class ProductService
{
    private array $registeredProducts = [];

    /**
     * @CommandHandler()
     */
    public function register(RegisterProductCommand $command) : void
    {
        $this->registeredProducts[$command->getProductId()] = $command->getCost();
    }

    /**
     * @QueryHandler()
     */
    public function getPrice(GetProductPriceQuery $query) : int
    {
        return $this->registeredProducts[$query->getProductId()];
    }
}
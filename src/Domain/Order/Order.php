<?php

namespace App\Domain\Order;

use App\Infrastructure\AddUserId\AddUserId;
use Ecotone\Modelling\Annotation\Aggregate;
use Ecotone\Modelling\Annotation\AggregateIdentifier;
use Ecotone\Modelling\Annotation\CommandHandler;

/**
 * @Aggregate()
 * @AddUserId()
 */
class Order
{
    /**
     * @AggregateIdentifier()
     */
    private int $orderId;

    private int $buyerId;

    /**
     * @var OrderedProduct[]
     */
    private array $orderedProducts;

    private function __construct(int $orderId, int $buyerId, array $orderedProducts)
    {
        $this->orderId = $orderId;
        $this->buyerId = $buyerId;
        $this->orderedProducts = $orderedProducts;
    }

    /**
     * @CommandHandler(inputChannelName="order.place")
     */
    public static function placeOrder(PlaceOrderCommand $command, array $metadata, GetProductCostService $getProductCostService) : self
    {
        $orderedProducts = [];
        foreach ($command->getProductIds() as $productId) {
            $orderedProducts[] = new OrderedProduct($productId, $getProductCostService->getBy($productId));
        }

        return new self($command->getOrderId(), $metadata["userId"], $orderedProducts);
    }
}
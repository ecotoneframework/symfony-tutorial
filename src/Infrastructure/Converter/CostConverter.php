<?php


namespace App\Infrastructure\Converter;

use App\Domain\Product\Cost;
use Ecotone\Messaging\Annotation\Converter;

/**
 * @Converter()
 */
class CostConverter
{
    /**
     * @Converter()
     */
    public function convertFrom(Cost $cost) : string
    {
        return $cost->getAmount();
    }

    /**
     * @Converter()
     */
    public function convertTo(int $amount) : Cost
    {
        return new Cost($amount);
    }
}
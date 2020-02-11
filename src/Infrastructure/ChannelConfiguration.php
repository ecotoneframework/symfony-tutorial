<?php


namespace App\Infrastructure;

use Ecotone\Messaging\Annotation\ApplicationContext;
use Ecotone\Messaging\Annotation\Extension;

/**
 * @ApplicationContext()
 */
class ChannelConfiguration
{
    /**
     * @Extension()
     */
    public function orderPlaceChannel()
    {

    }
}
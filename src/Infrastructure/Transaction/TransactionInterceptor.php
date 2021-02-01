<?php

namespace App\Infrastructure\Transaction;

use Ecotone\Messaging\Annotation\Interceptor\Around;
use Ecotone\Messaging\Handler\Processor\MethodInvoker\MethodInvocation;

class TransactionInterceptor
{
    /**
     * @Around(
     *     pointcut="Ecotone\Modelling\CommandBus"
     * )
     */
    public function transactional(MethodInvocation $methodInvocation)
    {
        echo "Start transaction\n";
        $result = $methodInvocation->proceed();
        echo "Commit transaction\n";

        return $result;
    }
}
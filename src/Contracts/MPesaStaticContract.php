<?php

namespace Bluteki\MpesaGateway\Contracts;

interface MPesaStaticContract {

    /**
     * @param float $amount
     * @param string $msisdn
     * @param string $transactionReference
     * @param string $thirdPartyReference
     */
    public static function c2b(
        float $amount,
        string $msisdn,
        string $transactionReference,
        string $thirdPartyReference
    );
}
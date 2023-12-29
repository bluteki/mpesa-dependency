<?php

namespace Bluteki\MpesaGateway\Contracts;

interface MpesaContract {

    /**
     * @param string $host
     * @param string $origin
     * @param string $token
     * @param string $serviceProviderCode
     * @param string $initiatorIdentifier
     * @param string $securityCredential
     */
    public function __construct(
        string $host,
        string $origin,
        string $token,
        string $serviceProviderCode
        // string $initiatorIdentifier,
        // string $securityCredential
    );

    public function c2b(
        float $amount,
        string $msisdn,
        string $transactionReference,
        string $thirdPartyReference
    );
}
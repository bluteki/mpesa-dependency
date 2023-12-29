<?php

namespace Bluteki\MpesaGateway;

use Bluteki\MpesaGateway\Contracts\MPesaStaticContract;
use Bluteki\MpesaGateway\Config\Config;
use Bluteki\MpesaGateway\Helpers\RSAToken;

class Mpesa extends Config implements MPesaStaticContract {

    /**
     * @var bool $test
     */
    protected static bool $fake = false;

    /**
     * @var string
     */
    protected static string $status = "";

    /**
     * @var int
     */
    protected static int $responseCode = 200;

    /**
     * @param int $responseCode
     * @param string $status
     */
    public static function fake(int $responseCode = 200, string $status = ""): void
    {
        self::$fake = true;
        self::$status = $status;
        self::$responseCode = $responseCode;
    }

    /**
     * @param string $status
     */
    public static function setStatus(string $status): void
    {
        self::$status = $status;
    }

    /**
     * @param int $code
     */
    public static function setResponseCode(int $code): void
    {
        self::$responseCode = $code;
    }

    public static function c2b( float $amount, string $msisdn, string $transactionReference, string $thirdPartyReference) {
        return (new static())->mPesa()->c2b( $amount, $msisdn, $transactionReference, $thirdPartyReference );
    }

    protected function mPesa()
    {
        $token = RSAToken::make(self::getApiKey(), self::getPublicKey());
        $request = new Request(self::getHost(), self::getOrigin(), $token, self::getServiceProviderCode());
        return $request->setFake(self::$fake, self::$responseCode, self::$status);
    }
}
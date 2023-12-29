<?php

namespace Bluteki\MpesaGateway\Config;

class Config {

    /**
     * @var string $environment
     */
    private static string $environment = 'development';

    /**
     * @var string $host
     */
    private static string $host = 'api.sandbox.vm.co.mz';

    /**
     * @var string $origin
     */
    private static string $origin = 'developer.mpesa.vm.co.mz';

    /**
     * @var string $api_key
     */
    private static string $api_key;

    /**
     * @var string $public_key
     */
    private static string $public_key;

    /**
     * @var string $port
     */
    private static string $port = '18352';

    /**
     * @var string $service_provider_code
     */
    private static string $service_provider_code = '171717';

    public static function config( string $api_key, string $public_key, string $host = null, string $origin = null, string $port = null, string $service_provider_code = null, string $environment = null ) {
        self::$environment = $environment ?? self::$environment;
        self::$host = $host ?? self::$host;
        self::$origin = $origin ?? self::$origin;
        self::$api_key = $api_key;
        self::$public_key = $public_key;
        self::$port = $port ?? self::$port;
        self::$service_provider_code = $service_provider_code ?? self::$service_provider_code;
    }

    /**
     * @return string
     */
    public static function getEnvironment(): string 
    {
        return self::$environment;
    }

    /**
     * @return string
     */
    public static function getHost(): string 
    {
        return self::$host;
    }

    /**
     * @return string
     */
    public static function getApiKey(): string 
    {
        return self::$api_key;
    }

    /**
     * @return string
     */
    public static function getPublicKey(): string 
    {
        return self::$public_key;
    }

    /**
     * @return string
     */
    public static function getPort(): string 
    {
        return self::$port;
    }

    /**
     * @return string
     */
    public static function getServiceProviderCode(): string 
    {
        return self::$service_provider_code;
    }

    public static function getOrigin(): string
    {
        return self::$origin;
    }
}
<?php

namespace Bluteki\MpesaGateway;

use Bluteki\MpesaGateway\Contracts\MpesaContract;
use GuzzleHttp\Client;
use \GuzzleHttp\Exception\RequestException;
use \GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\StreamInterface;

class Request implements MpesaContract
{

    /**
     * @var string $host
     */
    protected string $host;

    /**
     * @var string $origin
     */
    protected string $origin;

    /**
     * @var string $token
     */
    protected string $token;

    /**
     * @var string $serviceProviderCode
     */
    protected string $serviceProviderCode;

    /**
     * @var bool $fake
     */
    protected bool $fake;

    /**
     * @var int $code
     */
    protected int $responseCode;

    /**
     * @var string $status
     */
    protected string $responseStatus;

    public function __construct($host, $origin, $token, $serviceProviderCode)
    {
        $this->host = $host;
        $this->origin = $origin;
        $this->token = $token;
        $this->serviceProviderCode = $serviceProviderCode;
    }

    /**
     * @param bool $fake
     * @param int $code
     * @param string $status
     * @return MPesaContract
     */
    public function setFake(bool $fake, int $code, string $status): MpesaContract
    {
        $this->fake = $fake;
        $this->responseCode = $code;
        $this->responseStatus = $status;
        return $this;
    }

    public function c2b(float $amount, string $msisdn, string $transactionReference, string $thirdPartyReference)
    {
        $data = [
            "input_TransactionReference" => $transactionReference,
            "input_CustomerMSISDN" => $msisdn,
            "input_Amount" => $amount,
            "input_ThirdPartyReference" => $thirdPartyReference,
            "input_ServiceProviderCode" => $this->serviceProviderCode
        ];

        $client = $this->request(Mpesa::getPort());

        $request = new \GuzzleHttp\Psr7\Request('POST', '/ipg/v1x/c2bPayment/singleStage/', [
            'Content-Type' => 'application/json',
            'origin' => $this->origin,
            'Authorization' => 'Bearer ' . $this->token,
        ], json_encode($data));

        try {
            $response = $client->send($request);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        return new Transaction($this->streamToArray($response->getBody()));
    }

    protected function request(string $port = ''): Client
    {
        return new Client(['base_uri' => 'https://' . $this->host . ':' . $port]);
    }

    /**
     * Convert guzzle stream to array.
     *
     * @param StreamInterface $stream
     * @return array
     */
    protected function streamToArray(StreamInterface $stream): array
    {
        return json_decode((string) $stream, true);
    }
}
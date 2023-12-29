<?php

namespace Bluteki\MpesaGateway;
use Bluteki\MpesaGateway\Contracts\TransactionContract;

/**
 * @property string $responseCode
 * @property string $transactionID
 * @property string $conversationID
 * @property string $transactionStatus
 * @property string $thirdPartyReference
 * @property string $responseDescription
 */
class Transaction implements TransactionContract {

    /**
     * the model's atributes
     * 
     * @var array
     */
    protected array $attributes = [];

    /**
     * Construct transaction from mpesa api.
     *
     * @param array $response
     */
    public function __construct($response) {
        $this->attributes = $response;
    }

    public function getRespondeCode(): string 
    {
        return $this->responseCode;
    }

    /**
     * Get transaction status.
     *
     * @return string
     */
    public function getTransactionStatus(): string
    {
        return $this->transactionStatus;
    }

    /**
     * Get transaction id.
     *
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionID;
    }

    /**
     * Get transaction conversation id.
     *
     * @return string
     */
    public function getConversationId(): string
    {
        return $this->conversationID;
    }

    /**
     * Get transaction description.
     *
     * @return string
     */
    public function getTransactionDescription(): string
    {
        return $this->responseDescription;
    }

    /**
     * Get transaction reference.
     *
     * @return string
     */
    public function getThirdPartReference(): string
    {
        return $this->thirdPartyReference;
    }

    public function getMessage(): string
    {
        return Response::$codes[$this->attributes['output_ResponseCode']]['code'];
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'responseCode' => $this->attributes['output_ResponseCode'] ?? null,
            'transactionID' => $this->attributes['output_TransactionID'] ?? null,
            'conversationID' => $this->attributes['output_ConversationID'] ?? null,
            'responseDescription' => $this->attributes['output_ResponseDesc'] ?? null,
            "thirdPartyReference" => $this->attributes["output_ThirdPartyReference" ] ?? null,
            'transactionStatus' => $this->attributes['output_ResponseTransactionStatus'] ?? null,
        ];
    }
}
<?php

namespace Bluteki\MpesaGateway\Contracts;

interface TransactionContract {

    /**
     * Construct transaction from mpesa api.
     *
     * @param array $response
     */
    public function __construct(array $response);

    /**
     * Get transaction response code
     * 
     * @return string
     */
    public function getRespondeCode(): string;

    /**
     * Get transaction status
     * 
     * @return string
     */
    public function getTransactionStatus(): string;

    /**
     * Get transactio id
     * 
     * @return string
     */
    public function getTransactionId(): string;

    /**
     * Get converstion id
     * 
     * @return string
     */
    public function getConversationId(): string;

    /**
     * Get transaction description
     * 
     * @return string
     */
    public function getTransactionDescription(): string;

    /**
     * Get third party reference
     * 
     * @return string
     */
    public function getThirdPartReference(): string;

    /**
     * Get transaction message
     * 
     * @return string
     */
    public function getMessage(): string;

    /**
     * Convert the model instance to an array
     * 
     * @return array
     */
    public function toArray(): array;

    
}
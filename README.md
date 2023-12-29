# MPESA DEPENDENCY 

Dependency for consumption of the mpesa api 

## Instalação

To install this dependency, just run the command below:
```shell
composer require rafaelrogerio/mpesa-dependency
```

## Utilização

To use this manager, just follow the example below:
```php
<?php

require __DIR__.'/../../vendor/autoload.php';

use \Bluteki\MpesaGateway\Mpesa;

// configuring api access credentials
Mpesa::config(
    'enter you api key',
    'enter your public key',
    'host',
    'origin',
    'port',
    'service_provider_code'
);

$transactionReference = bin2hex(random_bytes(6)); 
$thirdPartyReference = bin2hex(random_bytes(6));
$response = Mpesa::c2b(1, '258849549369', $transactionReference, $thirdPartyReference);

echo '<pre>';
print_r($response->toArray());
```

## Requisitos
- PHP 8.0 or higher required
<?php
declare(strict_types=1);

namespace M3O;

use GuzzleHttp\ClientInterface;
use M3O\Service\Cache as CacheService;
use M3O\Service\Crypto as CryptoService;
use M3O\Service\Currency as CurrencyService;

class M3O
{
    private ClientInterface $client;
    private ?CacheService $cacheService;
    private ?CryptoService $cryptoService;
    private ?CurrencyService $currencyService;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCacheService(): CacheService
    {
        if ($this->cacheService === null) {
            $this->cacheService = new CacheService($this->client);
        }
        return $this->cacheService;
    }

    public function getCryptoService(): CryptoService
    {
        if ($this->cryptoService === null) {
            $this->cryptoService = new CryptoService($this->client);
        }
        return $this->cryptoService;

    }

    public function getCurrencyService(): CurrencyService
    {
        if ($this->currencyService === null) {
            $this->currencyService = new CurrencyService($this->client);
        }
        return $this->currencyService;
    }
}
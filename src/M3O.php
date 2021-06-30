<?php
declare(strict_types=1);

namespace M3O;

use GuzzleHttp\ClientInterface;
use M3O\Service\Cache as CacheService;
use M3O\Service\Crypto as CryptoService;
use M3O\Service\Currency as CurrencyService;
use M3O\Service\Db as DbService;
use M3O\Service\Emoji as EmojiService;
use M3O\Service\File as FileService;
use M3O\Service\Forex as ForexService;
use M3O\Service\Geocoding as GeocodingService;
use M3O\Service\Helloworld as HelloworldService;
use M3O\Service\Id as IdService;
use M3O\Service\Image as ImageService;
use M3O\Service\Ip as IpService;
use M3O\Service\Location as LocationService;
use M3O\Service\Otp as OtpService;
use M3O\Service\Routing as RoutingService;
use M3O\Service\Rss as RssService;
use M3O\Util\PhoneValidator;

class M3O
{
    private ClientInterface $client;
    private PhoneValidator $phoneValidator;

    private ?CacheService $cacheService;
    private ?CryptoService $cryptoService;
    private ?CurrencyService $currencyService;
    private ?DbService $dbService;
    private ?EmojiService $emojiService;
    private ?FileService $fileService;
    private ?ForexService $forexService;
    private ?GeocodingService $geocodingService;
    private ?HelloworldService $helloworldService;
    private ?IdService $idService;
    private ?ImageService $imageService;
    private ?IpService $ipService;
    private ?LocationService $locationService;
    private ?OtpService $otpService;
    private ?RoutingService $routingService;
    private ?RssService $rssService;

    public function __construct(ClientInterface $client, PhoneValidator $phoneValidator)
    {
        $this->client = $client;
        $this->phoneValidator = $phoneValidator;
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

    public function getDbService(): DbService
    {
        if ($this->dbService === null) {
            $this->dbService = new DbService($this->client);
        }
        return $this->dbService;
    }

    public function getEmojiService(): EmojiService
    {
        if ($this->emojiService === null) {
            $this->emojiService = new EmojiService($this->client, $this->phoneValidator);
        }
        return $this->emojiService;
    }

    public function getFileService(): FileService
    {
        if ($this->fileService === null) {
            $this->fileService = new FileService($this->client);
        }
        return $this->fileService;
    }

    public function getForexService(): ForexService
    {
        if ($this->forexService === null) {
            $this->forexService = new ForexService($this->client);
        }
        return $this->forexService;
    }

    public function getGeocodingService(): GeocodingService
    {
        if ($this->geocodingService === null) {
            $this->geocodingService = new GeocodingService($this->client);
        }
        return $this->geocodingService;
    }

    public function getHelloworldService(): HelloworldService
    {
        if ($this->helloworldService === null) {
            $this->helloworldService = new HelloworldService($this->client);
        }
        return $this->helloworldService;
    }

    public function getIdService(): IdService
    {
        if ($this->idService === null) {
            $this->idService = new IdService($this->client);
        }
        return $this->idService;
    }

    public function getImageService(): ImageService
    {
        if ($this->imageService === null) {
            $this->imageService = new ImageService($this->client);
        }
        return $this->imageService;
    }

    public function getIpService(): IpService
    {
        if ($this->ipService === null) {
            $this->ipService = new IpService($this->client);
        }
        return $this->ipService;
    }

    public function getLocationService(): LocationService
    {
        if ($this->locationService === null) {
            $this->locationService = new LocationService($this->client);
        }
        return $this->locationService;
    }

    public function getOtpService(): OtpService
    {
        if ($this->otpService === null) {
            $this->otpService = new OtpService($this->client);
        }
        return $this->otpService;
    }

    public function getRoutingService(): RoutingService
    {
        if ($this->routingService === null) {
            $this->routingService = new RoutingService($this->client);
        }
        return $this->routingService;
    }

    public function getRssService(): RssService
    {
        if ($this->rssService === null) {
            $this->rssService = new RssService($this->client);
        }
        return $this->rssService;
    }

}
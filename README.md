# m3o-php
M3O Client for PHP


## Installation
`composer require cyingfan/m3o-php`


## Set up
1. Run `composer require cyingfan/m3o-php` to include the package.
2. Obtain your API key from [Micro Settings page](https://www.m3o.com/settings/keys)
3. Load your API key into environment variable `M3O_AUTH_TOKEN`. 
   `m3o-php` loads environment variables using `getenv()`. 
   Most environment variable libraries such as [Symfony Dotenv](https://github.com/symfony/dotenv) or [PHP dotenv](https://github.com/vlucas/phpdotenv) should work.

   

## Usage example
```php
use M3O\Factory;

$m3o = (new Factory())->getM3O();
$m3o->getCryptoService()->news('BTC');
```

## Service completion status 
- [X] [cache](https://m3o.com/cache)
- [X] [crypto](https://m3o.com/crypto)
- [X] [currency](https://m3o.com/currency)
- [X] [db](https://m3o.com/db)
- [X] [emoji](https://m3o.com/emoji)
- [X] [file](https://m3o.com/file)
- [X] [forex](https://m3o.com/forex)
- [X] [geocoding](https://m3o.com/geocoding)
- [X] [helloword](https://m3o.com/helloword)
- [ ] [id](https://m3o.com/id)
- [ ] [image](https://m3o.com/image)
- [ ] [ip](https://m3o.com/ip)
- [ ] [location](https://m3o.com/location)
- [ ] [otp](https://m3o.com/otp)
- [ ] [routing](https://m3o.com/routing)
- [ ] [rss](https://m3o.com/rss)
- [ ] [sentiment](https://m3o.com/sentiment)
- [ ] [stock](https://m3o.com/stock)
- [ ] [thumbnail](https://m3o.com/thumbnail)
- [ ] [time](https://m3o.com/time)
- [ ] [url](https://m3o.com/url)
- [ ] [user](https://m3o.com/user)
- [ ] [weather](https://m3o.com/weather)

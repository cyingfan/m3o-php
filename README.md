# m3o-php
M3O Client for PHP

![Github Build](https://github.com/cyingfan/m3o-php/actions/workflows/php.yml/badge.svg)

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
echo $m3o->getHelloworldService()->call('John Doe'), "\n";
```

## Service completion status 
- [X] [answer](https://m3o.com/answer)
- [X] [cache](https://m3o.com/cache)
- [X] [crypto](https://m3o.com/crypto)
- [X] [currency](https://m3o.com/currency)
- [X] [db](https://m3o.com/db)
- [X] [email](https://m3o.com/email)
- [X] [emoji](https://m3o.com/emoji)
- [X] [file](https://m3o.com/file)
- [X] [forex](https://m3o.com/forex)
- [X] [geocoding](https://m3o.com/geocoding)
- [X] [helloword](https://m3o.com/helloword)
- [X] [id](https://m3o.com/id)
- [X] [image](https://m3o.com/image)
- [X] [ip](https://m3o.com/ip)
- [X] [location](https://m3o.com/location)
- [X] [otp](https://m3o.com/otp)
- [X] [routing](https://m3o.com/routing)
- [X] [rss](https://m3o.com/rss)
- [X] [sentiment](https://m3o.com/sentiment)
- [X] [sms](https://m3o.com/sms)
- [X] [stock](https://m3o.com/stock)
- [X] [thumbnail](https://m3o.com/thumbnail)
- [X] [time](https://m3o.com/time)
- [X] [url](https://m3o.com/url)
- [X] [user](https://m3o.com/user)
- [X] [weather](https://m3o.com/weather)

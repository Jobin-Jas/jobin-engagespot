# jobin-engagespot
EngageSpot Laravel Integration


## What It Does

This package allows you to manage your [Engagespot](https://engagespot.co) notifications easly. 


### Installation

1 - You can install the package via composer:
```
composer require jobin/engagespot
```
2 - If you are installing on Laravel 5.4 or lower you will be needed to manually register Service Provider by adding it in config/app.php providers array.

```
'providers' => [
    //...
    \Jasjbn\Engagespot\EngagespotServiceProvider::class,
]
```

In Laravel 5.5 and above the service provider automatically.

3 - Now publish the config file for engagespot:

```
php artisan vendor:publish --provider="Jasjbn\Engagespot\EngagespotServiceProviderr"
```

## Getting Started

1. After package installation now add  `X-ENGAGESPOT-API-KEY'` and `X-ENGAGESPOT-API-SECRET` on config\engagespot.php file or you can directly update in your `.env` file by adding like.

```
X-ENGAGESPOT-API-SECRET = XXXXXXXXXXXXXXXXX
X-ENGAGESPOT-API-KEY' = XXXXXXXXXXXXX
```````

### Send Your Notification 


```
use Jasjbn\Engagespot\Engagespot;

$engagespot = new Engagespot();

        $engagespot->title = 'Test Notification';
        $engagespot->recipients = [
            '+639171234567',
            '+639171234568',
        ];
        $engagespot->url = 'https://www.google.com';
        $engagespot->icon = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png';
        $engagespot->channels = [
            'email',
            'webPush',
        ];

        $engagespot->send();
```




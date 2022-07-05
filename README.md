# jobin-engagespot
EngageSpot Laravel Integration


## What It Does

This package allows you to manage your [Engagespot](https://engagespot.co) notifications easly. 


### Installation

1 - You can install the package via composer:
```
composer require jobin/engagespot
```
2 - You will need to manually register Service Provider by adding it in config/app.php providers array.

```
'providers' => [
    //...
    \Jasjbn\Engagespot\EngagespotServiceProvider::class,
]
```

In Laravel 5.5 and above the service provider automatically.

3 - Now publish the config file for engagespot:

```
php artisan vendor:publish --provider="Jasjbn\Engagespot\EngagespotServiceProvider"
```

## Getting Started

1. After package installation now add  `X-ENGAGESPOT-API-KEY'` and `X-ENGAGESPOT-API-SECRET` on config\engagespot.php file or you can directly update in your `.env` file by adding like.

```
X_ENGAGESPOT_API_SECRET = XXXXXXXXXXXXXXXXX
X_ENGAGESPOT_API_KEY' = XXXXXXXXXXXXX
```````

### Send Your Notification 


```
use Jasjbn\Engagespot\Engagespot;

$engagespot = new Engagespot();

$engagespot->title = 'Test Notification';
$engagespot->message = "hey this is a test notification "
$engagespot->recipients = array("user@test.com","userone@test.com")
$engagespot->url = 'https://www.google.com'; 
$engagespot->icon = 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png';
$engagespot->channels = array('email','webPush');
$engagespot->SendGridObject = object(//send grid object)

$engagespot->send();

```




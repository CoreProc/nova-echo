# Nova Echo 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/coreproc/nova-echo.svg?style=flat-square)](https://packagist.org/packages/coreproc/nova-echo)
[![Quality Score](https://img.shields.io/scrutinizer/g/coreproc/nova-echo.svg?style=flat-square)](https://scrutinizer-ci.com/g/coreproc/nova-echo)
[![Total Downloads](https://img.shields.io/packagist/dt/coreproc/nova-echo.svg?style=flat-square)](https://packagist.org/packages/coreproc/nova-echo)

Adds Laravel Echo with your broadcast configuration to your Laravel Nova app.

## Installation

By using Nova Echo, we have a readily configured Laravel Echo instance in our JS.

Here are suggested options for broadcasting/receiving using websockets:
- [Pusher](https://pusher.com)
- [Laravel Websockets](https://docs.beyondco.de/laravel-websockets/)
- [Laravel Echo Server](https://github.com/tlaverdure/laravel-echo-server)

You can find instructions about setting up broadcasting in Laravel using the [official documentation](https://laravel.com/docs/5.7/broadcasting).

Once you have this set up in your Nova app, you can install this package via composer

```bash
composer require coreproc/nova-echo
```

You will then need to override Nova's `layout.blade.php`. Create a layout file `resources/views/vendor/nova/layout.blade.php` and copy the contents from `vendor/laravel/nova/resources/views/layout.blade.php`.

Include Nova Echo's blade file in the Nova layout. This blade file contains `meta` tags with your broadcast configuration.

```php
// file: resources/views/vendor/nova/layout.blade.php

<!DOCTYPE html>
<html lang="en" class="h-full font-sans antialiased">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=1280">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  @include('nova-echo::meta') <!-- Include this line -->
  
  <title>
  ...
  
```

## Usage

Nova Echo instantiates `Echo` and makes it available throughout your Nova app. You can access your `Echo` object through

```js
window.Echo
```

By default, this `Echo` instance already subscribes to the logged in user's private channel, which by default would be the namespace of your app's user object, ie. `App.User.{id}`.

You can access and attach listeners to this user's private channel through

```js
window.userPrivateChannel
```

To authenticate the user through this channel, make sure you have your `BroadcastServiceProvider` available with `Broadcast::routes()` declared. You'll also need to define access through your `route/channels.php` file, ie:

```php
// file: routes/channels.php

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});
```

You can override the `receivesBroadcastNotificationsOn` to use a different channel name.

```php
class User extends Authenticatable
{
    use Notifiable;
    
    ...
    
    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'users.' . $this->id;
    }
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email chris.bautista@coreproc.ph instead of using the issue tracker.

## Credits

- [Chris Bautista](https://github.com/chrisbjr)

## About CoreProc

CoreProc is a software development company that provides software development services to startups, digital/ad agencies, and enterprises.

Learn more about us on our [website](https://coreproc.com).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

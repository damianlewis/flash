# Easy Flash Messages

## Installation

First, pull in the package through Composer.

```js
"repositories": [
    {
      "type": "vcs",
      "url":  "https://github.com/damianlewis/flash.git"
    }
],
"require": {
    "laracasts/flash": "dev-master"
}
```

And then, if using Laravel, include the service provider within `app/config/app.php`.

```php
'providers' => [
    'Laracasts\Flash\FlashServiceProvider'
];
```

And, for convenience, add a facade alias to this same file at the bottom:

```php
'aliases' => [
    'Flash' => 'Laracasts\Flash\Flash'
];
```

## Usage

Within your controllers, before you perform a redirect...

```php
public function store()
{
    Flash::message('Welcome Aboard!');

    return Redirect::home();
}
```

You may also do:

- `Flash::alert('Message')`
- `Flash::info('Message')`
- `Flash::error('Message')`
- `Flash::warning('Message')`
- `Flash::secondary('Message')`
- `Flash::overlay('Modal Message', 'Modal Title')`

Again, if using Laravel, this will set three keys in the session:

- 'flash_notification.message' - The message you're flashing
- 'flash_notification.level' - A string that represents the type of notification (good for applying HTML class names)

With this message flashed to the session, you may now display it in your view(s). Maybe something like:

```html
@if (Session::has('flash_notification.message'))
    <div class="alert-box {{ Session::get('flash_notification.level') }}" data-alert>
        {{ Session::get('flash_notification.message') }}
        <a href="#" class="close">&times;</a>
    </div>
@endif
```

> Note that this package is optimized for use with Zurb Foundation.

Because flash messages and overlays are so common, if you want, you may use (or modify) the views that are included with this package. Simply append to your layout view:

```html
@include('flash::message')
```

## Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/foundation.css">
</head>
<body>

<div class="container">
    @include('flash::message')

    <p>Welcome to my website...</p>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>

<script>
    $(document).foundation();
</script>

<!-- This is only necessary if you do Flash::overlay('...') -->
<script>
    $('#flash-overlay-modal').foundation('reveal', 'open');
</script>

</body>
</html>
```

If you need to modify the flash message partials, you can run:

```bash
php artisan view:publish laracasts/flash
```

The two package views will now be located in the `app/views/packages/laracasts/flash/' directory.

> [Learn exactly how to build this very package on Laracasts!](https://laracasts.com/lessons/flexible-flash-messages)
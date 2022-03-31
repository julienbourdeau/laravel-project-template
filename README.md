# Laravel Project Template

```
laravel new PROJECT_NAME --git --jet --stack=livewire --teams
```

### Debugbar
```
composer require barryvdh/laravel-debugbar --dev
```

### Helpers
```
mkdir -p app/Support/
echo -e "<?php\n" > app/Support/helpers.php
```
Under autoload in composer.json
```
"files": [
	"app/Support/helpers.php"
],
```

```
composer require laravel/helpers
```


### Seed admin

```php
\App\Models\User::factory([
    'name' => 'Julien Bourdeau',
    'email' => 'julien@julienbourdeau.com',
])->create();
```

### Sentry

`composer require sentry/sentry-laravel`

In `app/Exceptions/Handler.php`
```php
public function register()
{
    $this->reportable(function (Throwable $e) {
        if (app()->bound('sentry')) {
            app('sentry')->captureException($e);
        }
    });
}
```
php artisan sentry:publish --dsn=https://examplePublicKey@o0.ingest.sentry.io/0


### Root user access

In `app/Support/helpers.php`

```php
function is_root(\App\Models\User $user){
    return 'julien@julienbourdeau.com' == $user->email;
}
```


### Horizon
* `composer require laravel/horizon`
* `php artisan horizon:install`
* Change gate to use `is_root($user)`


### Blade-icon thing
`composer require brunocfalcao/blade-feather-icons`


### Log tool
`composer require rap2hpoutre/laravel-log-viewer`
```php
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
```

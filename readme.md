# Laravel Payme Alignet :credit_card:

Este paquete está destinado para la integración de una manera más rápida y sencilla de la pasarela de pagos de Alignet.

## Instalación
Registra el Service Provider de esta aplicación en `config/app.php`
```php
    'providers' => [
        // ... Otros providers aquí
        LaravelPaymeAlignet\Providers\LaravelPaymeAlignetServiceProvider::class,   
    ]
```

Agrega el Facade a la lista de alias en `config/app.php`
```php
    'aliases' => [
        // ... Otros aliases aquí
        'LaravelPayme' => LaravelPaymeAlignet\Facades\LaravelPayme::class,   
    ]
```

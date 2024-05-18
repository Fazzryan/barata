<p align="center"><a href="https://sirena.bpbdkabtasikmalaya.id" target="_blank"><img src="https://github.com/olinfoid/sirena/assets/86624702/45979cbd-a108-487e-b961-570ea459ca99" width="400" alt="Sirena Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Teknologi SIRENA
**Framework Web:**
```Laravel 11```

**Framework UI:**
```Bootstrap 1.13.0```

**Peta:**
```Leaflet 1.7.1```

**Bahasa Pemrograman:**
```PHP 8.2.9```

## Library SIRENA
Library yang digunakan Aplikasi SIRENA sebagai berikut :

**1. Library "Toastr" :**
```install = composer require brian2694/laravel-toastr```

**2. Library "Excel" :**
```install = composer require maatwebsite/excel```

Silahkan unduh library nya menggunakan composer.

## Middleware SIRENA
Middleware yang digunakan Aplikasi SIRENA sebagai berikut :

**1. Middleware "CekAuthRole" :**
```create = php artisan make:middleware CekAuthRole```

**2. Middleware "CekRole" :**
```create = php artisan make:middleware CekRole```

Silahkan buat Middleware nya menggunakan composer/terminal.

Selanjutnya Daftarkan Middleware nya agar terdeteksi oleh Sistem Laravel :

```
Laravel < 10 
app => Http => Kernel.php

Laravel > 11
bootstrap => app.php
```

Simpan di bagian :
```
Laravel < 10 
protected $middlewareAliases = [

/*custom middleware */
'CekAuthRole' => \App\Http\Middleware\CekAuthRole::class,
'CekRole' => \App\Http\Middleware\CekRole::class,

];

Laravel > 11
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        /*custom middleware */
        'CekAuthRole' => \App\Http\Middleware\CekAuthRole::class,
        'CekRole' => \App\Http\Middleware\CekRole::class,
    ]);
})

```

## License

Framework Laravel adalah perangkat lunak sumber terbuka yang dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).

Aplikasi SIRENA dibuat oleh [Ilman Hilmi Oriza, S.T](https://olinfo.id).

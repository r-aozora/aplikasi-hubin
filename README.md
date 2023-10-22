# Aplikasi Hubin

Sebuah Dashboard untuk mengelola Sistem Pendataan Administrasi Prakerin di Hubin (Hubungan Industri).

## Instalasi

```bash
    git clone https://github.com/r-aozora/aplikasi-hubin.git

    cd aplikasi-hubin

    composer install

    cp .env.example .env

    php artisan migrate --seed

    php artisan key:generate

    php artisan serve
```

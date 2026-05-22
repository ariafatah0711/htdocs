# Filament
## setup & install filament with laravel
```bash
cd pemweb1
composer create-project --prefer-dist laravel/laravel P11
# atur .env, dan create databases
# ---
# mysql -u root -e "CREATE DATABASE filament_app"
# bisa juga auto waktu kita lakukan migrate
# ---

php artisan migrate
```

sebelum install filamen, dan jika menggunakan laragon lakukan
1. Klik kanan Laragon → PHP → php.ini
2. Cari `;extension=zip` dan ubah menjadi `extension=zip`
3. setelah itu lakukan restart laragon, atau restart php nya saja

```bash
composer require filament/filament:"~5.0"

php artisan filament:install --panels
# What is the panel's ID? [admin]
# ❯ admin

# All done! Would you like to show some love by starring the Filament repo on GitHub? (yes/no) [yes]
# ❯ no

php artisan make:filament-user
# Name:
# ❯ admin
# Email address:
# ❯ admin@gmail.com
# Password:
# ❯ admin

php artisan serve
```

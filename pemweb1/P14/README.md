# Filament 3
## Installation
```bash
composer install

php artisan serve
```

## Materi FILAMENT BLOG
```bash
# install
composer require firefly/filament-blog

php artisan filament-blog:install

# PUBLISH
php artisan vendor:publish --provider="Firefly\FilamentBlog\FilamentBlogServiceProvider" --tag=filament-blog-views

php artisan vendor:publish --provider="Firefly\FilamentBlog\FilamentBlogServiceProvider" --tag=filament-blog-config

php artisan vendor:publish --provider="Firefly\FilamentBlog\FilamentBlogServiceProvider" --tag=filament-blog-components

php artisan vendor:publish --provider="Firefly\FilamentBlog\FilamentBlogServiceProvider" --tag=filament-blog-migrations

# MIGRATION
php artisan migrate
```

### CODE’S
- Code app/Providers/Filament/AdminPanelProvider.php

membuat PostController
```bash
php artisan make:controller PostController
```

- Code app/Http/Controllers/PostController.php
- Code Routes/Web.php

### REFRESH & RUN SERVER
```bash
php artisan optimize:clear
php artisan serve
```


## Materi AUTHORIZATION
### SPATIE/LARAVEL-PERMISSION
```bash
# INSTALL
composer require spatie/laravel-permission --prefer-dist

# PUBLISH
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

# MIGRATION
php artisan migrate
```

### FIELD TAMBAHAN DI TABEL USER
```bash
php artisan make:migration add_is_admin_to_users_table
```

- Code database\migrations\add_is_admin_to_users_table.php

```bash
php artisan migrate
```

### MEMBUAT SEEDER ROLE & PERMISSION
```bash
php artisan make:seeder PermissionsAndRolesSeeder
```

- Code database\seeders\PermissionsAndRolesSeeder.php
- Code Models/User.php

```bash
php artisan db:seed --class=PermissionsAndRolesSeeder
```

### MEMBUAT RESOURCE USER & MODELS
```bash
php artisan make:filament-resource User --generate
> name
> no
```

Buat 2 file baru di dalam folder models dengan nama:
- Code models/**Permission.php**
- Code models/Role.php

```bash
# install pluggin
composer require althinect/filament-spatie-roles-permissions
composer require "spatie/laravel-permission:^7.4" "althinect/filament-spatie-roles-permissions:^3.3" -W

# publish
php artisan vendor:publish --tag="filament-spatie-roles-permissions-config" --force
```

- Code app/Providers/Filament/AdminPanelProvider.php

### POLICIES
```bash
php artisan permissions:sync --policies
```

- Code app\Providers\AppServiceProvider.php
- Code config\filament-spatie-roles-permissions.php
  -> ubah navigation_section_group menjadi User Management
  ```'navigation_section_group' => 'User Management',```
- Code app\Filament\Resources\Users\UserResource.php,
- Code app\Filament\Resources\Divisis\DivisiResource.php
- Code app\Filament\Resources\Jabatans\JabatanResource.php

```bash
php artisan optimize:clear
php artisan serve
```

### Test
- login sebagai admin dengan email: *admin@gmail.com:password*
- login sebagai user dengan email: *budi@mail.com:password*

```bash
composer require laravel/boost --dev

php artisan boost:install
```

```bash
rm -rf vendor
composer install
php artisan optimize:clear
php artisan serve
```

### Rename Column Name to Nama
```bash
php artisan make:migration rename_name_to_nama_in_staff_table
```

- cek folder database/migrations, pastikan ada file dengan nama yang sesuai dengan perintah di atas
- buka file tersebut, lalu ubah isi method up() menjadi seperti berikut:

```php
public function up(): void
{
    Schema::table('staff', function (Blueprint $table) {
        $table->renameColumn('name', 'nama');
        $table->string('foto')->nullable()->change();
    });
}
```

```bash
php artisan migrate
```

atau gunakan

```sql
ALTER TABLE staff RENAME COLUMN name TO nama;
ALTER TABLE staff MODIFY foto VARCHAR(255) NULL;
```

```bash
php artisan storage:link
# berfungsi untuk membuat symbolic link dari public/storage ke storage/app/public, sehingga file yang disimpan di storage/app/public dapat diakses melalui URL public/storage

php artisan serve
```

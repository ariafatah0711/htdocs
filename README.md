# Filament 1
### setup & install filament with laravel
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

---

# Filament 2
```bash
composer install
```

## Migration & Seeder
### membuat model & Migration
```bash
# membuat model dengan migration
php artisan make:model Divisi -m
php artisan make:model Jabatan -m
php artisan make:model Pegawai -m
php artisan make:model JenisTraining -m
php artisan make:model Training -m

# membuat migration Pivot Pegawai Training
php artisan make:migration create_pegawai_training_table
```

### menyesuaikan Source Code Database Migration & Model
edit code `database/migrations`, dan `app/Models` sesuai dengan kebutuhan, setelah itu lakukan migrate

```bash
php artisan migrate
```

### Seeder untuk data dummy
```bash
php artisan make:seeder UserSeeder
php artisan make:seeder DivisiSeeder
php artisan make:seeder JabatanSeeder
php artisan make:seeder PegawaiSeeder
php artisan make:seeder JenisTrainingSeeder
php artisan make:seeder TrainingSeeder
php artisan make:seeder PegawaiTrainingSeeder
```

> hasil seeder bisa dilihat di `database/seeders`, edit sesuai kebutuhan, setelah itu lakukan seeding

```bash
# reset seed before seeding
php artisan migrate:refresh --seed

# jika mau seeding saja tanpa reset database
php artisan db:seed

# jika mau seeding dengan class tertentu
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=DivisiSeeder
php artisan db:seed --class=JabatanSeeder
php artisan db:seed --class=PegawaiSeeder
php artisan db:seed --class=JenisTrainingSeeder
php artisan db:seed --class=TrainingSeeder
php artisan db:seed --class=PegawaiTrainingSeeder
```

## RESOURCE
### MEMBUAT ALL RESOURCES
ini berfungsi untuk membuat resource, dengan nama `Divisi`, dan generate semua file yang dibutuhkan untuk resource tersebut seperti `DivisiResource`, `DivisiResource/Pages`, `DivisiResource/Widgets`, dll

```bash
php artisan make:filament-resource Divisi --generate
# What is the title attribute for this model?
# > nama_divisi
# Would you like to generate a read-only view page for the resource? (yes/no) [no]
# > no

php artisan make:filament-resource Jabatan --generate
# nama_jabatan
# no

php artisan make:filament-resource Pegawai --generate --record-title-attribute=nama --no-interaction
php artisan make:filament-resource JenisTraining --generate --record-title-attribute=nama_jenis --no-interaction
php artisan make:filament-resource Training --generate --record-title-attribute=nama_training --no-interaction
```

### MENJALANKAN SERVER
```bash
php artisan serve
```

setelah itu buka `http://localhost:8000/admin` untuk melihat hasilnya, dan login dengan user yang sudah dibuat sebelumnya, yaitu `admin1@gmail.com` dengan password `password`

## UPDATE
### UPDATE RESOURCE
1. ubah bagian `app\Filament\Resources\Pegawais\Tables\PegawaisTable.php` yang tadinya menampilkan divisi_id, dan jabatan_id ubah menjadi menjadi divisi.nama_divisi, dan jabatan.nama_jabatan, dan tambahkan juga labelnya agar lebih mudah dipahami

```php
TextColumn::make('divisi.nama_divisi')
    ->label('Divisi')
    ->searchable()
    ->sortable(),
    // ->numeric()
    // ->sortable(),
TextColumn::make('jabatan.nama_jabatan')
    ->label('Jabatan')
    ->searchable()
    ->sortable(),
    // ->numeric()
    // ->sortable(),
```

2. ubah juga bagian `app\Filament\Resources\Pegawais\Schemas\PegawaisForm.php`, tambahkan field untuk upload file.

dengan menggunakan `use Filament\Forms\Components\FileUpload;`, dan ubah jadi
```php
// ....
Select::make('divisi_id')
    ->relationship('divisi', 'nama_divisi')
    ->searchable()
    ->preload()
    ->required(),
Select::make('jabatan_id')
    ->relationship('jabatan', 'nama_jabatan')
    ->searchable()
    ->preload()
    ->required(),
// ....
FileUpload::make('foto')
    ->label('Foto Pegawai')
    ->image()->directory('pegawai')
    ->imageEditor()->maxsize(2048)->nullable(),
// ....
```

### Aktifkan Storage Link
```bash
php artisan storage:link
```

buka file ini `app\Filament\Resources\Pegawais\Tables\PegawaisTable.php` dan sesuaikan.

```php
# tambahkan ini
use Filament\Tables\Columns\ImageColumn;
// ....
ImageColumn::make('foto')
    ->label('Foto')
    ->circular(),
// ....
```

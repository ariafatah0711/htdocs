# Tugas 1 - Personal Home Page dengan Bootstrap RWD

**Mata Kuliah:** Pemrograman Web
**Framework:** Bootstrap 5 (Responsive Web Design)
**Database:** MySQL / MariaDB
**Backend:** PHP 7.4+

---

## 📋 Ringkasan Aplikasi

Aplikasi Personal Home Page adalah platform dinamis yang menampilkan profil pribadi dengan fitur manajemen data pendidikan (sekolah/kampus). Aplikasi menggunakan sistem grid Bootstrap dengan tampilan responsif, dilengkapi dengan autentikasi pengguna dan CRUD operations untuk data level pendidikan dan riwayat studi.

---

## ✅ Requirement & Checklist Implementasi

### 1. Sistem Grid Layout (30 poin)
- ✅ **Header (12 grid)** - Carousel Bootstrap dengan gambar profil & tagline
- ✅ **Menu/Navbar (12 grid)** - Navigation bar Bootstrap dengan menu dropdown
- ✅ **Sidebar (3 grid)** - List group Bootstrap untuk navigasi tambahan
- ✅ **Main Content (9 grid)** - Halaman dinamis dengan routing internal
- ✅ **Footer (12 grid)** - Alert component Bootstrap dengan informasi

### 2. Home Page (5 poin)
- ✅ Profile card horizontal Bootstrap
- ✅ Menampilkan foto profil pengguna
- ✅ Deskripsi singkat profil

### 3. About Me Page (5 poin)
- ✅ Accordion Bootstrap untuk:
  - Hobby & Minat
  - Menu Favorit
  - Pengalaman Organisasi

### 4. Contact Me Page (5 poin)
- ✅ Card Groups Bootstrap untuk social media
- ✅ Icon sosial media
- ✅ Link dan informasi kontak

### 5. My Studies Menu (35 poin)
#### a. Level CRUD (10 poin)
- ✅ Create/Read/Update/Delete Level Pendidikan (TK, SD, SMP, SMK, Kuliah)
- ✅ Modal form Bootstrap
- ✅ Tabel dengan aksi (Edit/Delete)
- ✅ Flash error handling

#### b. Studies/Riwayat Sekolah CRUD (25 poin)
- ✅ Create: Form tambah dengan upload foto
- ✅ Read: Tabel list dengan join ke tabel level
- ✅ Update: Modal edit dengan opsi ganti foto
- ✅ Delete: Hapus data & file foto
- ✅ Detail page untuk melihat info lengkap
- ✅ Flash error handling untuk semua aksi

### 6. Autentikasi (10 poin)
- ✅ Login form dengan validasi
- ✅ Session management
- ✅ Proteksi halaman CRUD (redirect ke login jika belum autentikasi)
- ✅ Flash error untuk login gagal

### 7. User Menu & Logout (10 poin)
- ✅ Menu Login tampil hanya saat user belum login
- ✅ Menu User tampil setelah login (username & role)
- ✅ Submenu Logout
- ✅ Redirect ke home setelah logout

---

## 🗂️ Struktur Direktori

```
Tugas_1/
├── index.php                    # Entry point aplikasi
├── README.md                    # Dokumentasi
│
├── app/
│   ├── controllers/
│   │   ├── auth.php            # Login/Logout
│   │   ├── level.php           # CRUD Level
│   │   └── studies.php         # CRUD Studies (dengan upload file)
│   │
│   ├── layouts/
│   │   ├── header.php          # Header dengan carousel
│   │   ├── menu.php            # Navbar dengan dropdown
│   │   ├── sidebar.php         # Sidebar list group
│   │   ├── main.php            # Wrapper main content
│   │   ├── footer.php          # Footer alert
│   │   └── components/
│   │       └── flip-card.php   # Custom flip card component
│   │
│   └── pages/
│       ├── home.php            # Home dengan card profil
│       ├── about.php           # About dengan accordion
│       ├── contact.php         # Contact dengan card groups
│       ├── auth/
│       │   └── login.php       # Form login
│       ├── level/
│       │   └── list.php        # CRUD tabel level
│       └── studies/
│           ├── list.php        # CRUD tabel studies
│           └── detail.php      # Detail studies
│
├── assets/
│   ├── css/
│   │   ├── bootstrap.min.css
│   │   ├── bootstrap-icons.css
│   │   ├── style.css           # Custom styles
│   │   └── flip-card.css       # Flip card styles
│   ├── img/                    # Gambar aplikasi
│   └── js/
│       └── bootstrap.bundle.min.js
│
├── config/
│   ├── db.php                  # Database connection (PDO)
│   └── schema.sql              # Database schema & sample data
│
└── uploads/                    # Folder untuk upload foto sekolah
```

---

## 🚀 Setup & Installation

### Prerequisites
- PHP 7.4 atau lebih tinggi
- MySQL/MariaDB
- Laragon atau XAMPP (Apache + MySQL)

### Langkah Instalasi

1. **Buat Database**
```bash
mysql -u root
# (Jika menggunakan password, tambahkan -p)
```

2. **Di MySQL CLI, jalankan:**
```sql
CREATE DATABASE IF NOT EXISTS db_tugas1;
USE db_tugas1;
```

3. **Import schema:**
```sql
-- Copy paste isi file config/schema.sql ke MySQL CLI
-- Atau gunakan:
SOURCE /path/to/config/schema.sql;
```

4. **Set Permission Upload Folder**
```bash
# Windows (tidak perlu, biasanya sudah default)
# Linux/Mac:
chmod 755 uploads/
```

5. **Jalankan Aplikasi**
- Akses via browser: `http://localhost/pemweb1/Tugas_1/`

---

## 🔐 Default Account

| Username | Password | Role  |
|----------|----------|-------|
| admin    | admin123 | admin |

---

## 💾 Database Schema

### Tabel: `users`
```sql
id (INT) - Primary Key
username (VARCHAR 100) - Unique
password (VARCHAR 255) - MD5 hashed
role (ENUM: admin, user) - Default: user
```

### Tabel: `level`
```sql
id (INT) - Primary Key
nama (VARCHAR 100) - Unique (TK, SD, SMP, SMK, Kuliah)
```

### Tabel: `studies`
```sql
id (INT) - Primary Key
nama (VARCHAR 100) - Nama sekolah/kampus
idlevel (INT) - Foreign Key ke tabel level
keterangan (TEXT) - Deskripsi/alamat
tahun_lulus (YEAR) - Tahun kelulusan
foto_sekolah (VARCHAR 255) - Nama file foto
```

---

## 🎯 Feature Highlights

✨ **Responsive Design** - Mobile-friendly dengan Bootstrap grid
🔒 **Authentication** - Session-based login protection
📸 **File Upload** - Upload & manage foto sekolah
⚠️ **Error Handling** - Flash message untuk error/success
🎨 **Modern UI** - Bootstrap 5 components (Modal, Card, Accordion, Carousel)
🗂️ **MVC Pattern** - Controller, View, Model separation

---

## 📝 Catatan Teknis

- Menggunakan **PDO prepared statements** untuk keamanan SQL Injection
- Foto tersimpan di folder `uploads/` dengan nama aman (timestamp + sanitize)
- Error dari database ditampilkan di UI via session flash (bukan di URL)
- Session divalidasi di setiap halaman yang memerlukan autentikasi
- Password di-hash menggunakan MD5 (untuk tugas; production gunakan bcrypt/password_hash)

<!-- ```
# Windows
cp -r C:\Users\ariaf\scoop\persist\laragon\www\pemweb1\Tugas_1 E:\_test
cd E:\_test\Tugas_1\

git init
git add .
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/ariafatah0711/pemweb1_tugas1.git
git push -u origin main

remove-item E:\_test\Tugas_1 -Recurse
``` -->

# P7
- https://canary-bagel-d7a.notion.site/PERTEMUAN-7-SESSION-INSTALL-LARAVEL-34ac4ffc8a2d80e9b130df762de0c1b1

- https://getcomposer.org/
- https://laravel.com/

## add sql
### 1
```sql
CREATE TABLE member(
	id int primary key auto_increment,
	fullname varchar(30) NOT NULL,
	email varchar(30) NOT NULL,
	username varchar(30) NOT NULL,
	password char(40) NOT NULL,
	role enum('admin','manager','staff') NOT NULL,
	foto varchar(30) DEFAULT NULL
);

INSERT INTO member (fullname, email, username,
password, role, foto) VALUES
('Nasrul', 'nasrul99@gmail.com', 'nasrul', SHA1(MD5('password')), 'admin', NULL),
('Budi Santoso', 'budi@gmail.com', 'budi', SHA1(MD5('password')), 'manager', NULL),
('Ahmad Mulyawan', 'ahmad@gmail.com', 'ahmad', SHA1(MD5('password')), 'staff', NULL),
('Dewi Maharani', 'dewi@gmail.com', 'dewi', SHA1(MD5('password')), 'staff', NULL);
```

## Laravel
```bash
cd pemweb1/P7
composer create-project --prefer-dist laravel/laravel laravel

cd laravel
php artisan serve
```

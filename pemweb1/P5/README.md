# 5
```bash
DROP DATABASE IF EXISTS dbtoko;
CREATE DATABASE dbtoko;
USE dbtoko;

CREATE TABLE jenis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama varchar(30) NOT NULL UNIQUE
);

CREATE TABLE produk (
    id_product INT PRIMARY KEY AUTO_INCREMENT,
    no_product char(5) NOT NULL UNIQUE,
    nama varchar(30) NOT NULL,
    kondisi ENUM('Baru','Second') NOT NULL,
    harga DOUBLE NOT NULL,
    stok INT NOT NULL,
    id_jenis INT NOT NULL,
    FOREIGN KEY (id_jenis) REFERENCES jenis(id),
    foto varchar(30)
);

show tables;
describe produk;
describe jenis;
````

```bash
INSERT INTO jenis(nama) VALUES
('Elektronik'),('Furniture');

INSERT INTO produk
(no_product,nama,kondisi,harga,stok,id_jenis,foto)
VALUES
('KL111','Kulkas 2
Pintu','Baru',5000000,4,1,'kulkas.jpg'),
('KL112','Kulkas 2
Pintu','Second',2000000,2,1,'kulkas2.jpg'),
('MJ111','Meja
Belajar','Baru',3000000,5,2,'meja_belajar.jpg'),
('MJ112','Meja
Makan','Baru',4000000,2,2,'meja_makan.jpg');

SHOW COLUMNS FROM produk;
SELECT * FROM produk;
```

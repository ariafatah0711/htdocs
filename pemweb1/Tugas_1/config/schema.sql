DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS studies;

DROP TABLE IF EXISTS level;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE level (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE studies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    idlevel INT,
    keterangan TEXT,
    tahun_lulus YEAR,
    foto_sekolah VARCHAR(255),

    FOREIGN KEY (idlevel)
    REFERENCES level(id)
);

INSERT INTO level (nama) VALUES
('TK'),
('SD'),
('SMP'),
('SMK'),
('Kuliah');

INSERT INTO users
(username, password, role)
VALUES
(
    'admin',
    MD5('admin123'),
    'admin'
),
(
    'aria',
    MD5('aria123'),
    'user'
);

SELECT * FROM users;
SELECT * FROM level;
SELECT * FROM studies;

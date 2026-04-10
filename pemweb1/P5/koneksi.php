<?php

$dsn = 'mysql:dbname=dbtoko;host=localhost;port=3306';
$username = 'root';
$password = '';

try {
    $dbh = NEW PDO($dsn, $username, $password);
    $dbh->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    echo "Connection Succesfully with $username";
} catch(PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}

<?php

define('MARIADB_USER','sitejsvh_dbadmin');
define('MARIADB_PASSWORD','!H!3E4vz1YHS');
define('MARIADB_HOST','127.0.0.1');
define('MARIADB_NAME','sitejsvh_ergforfan');
define('MARIADB_PORT','3306');

define('PDO_DSN','mysql:host=127.0.0.1;dbname=sitejsvh_ergforfan;port=3306');

try {
$db = new PDO(PDO_DSN, MARIADB_USER, MARIADB_PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    printf("We had a problem: %s\n", $e->getMessage());
}

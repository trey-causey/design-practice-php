<?php

require_once __DIR__ . '/../../../common/setup/config.inc.php';

function loadDatabase()
{
    try {
        $db = new PDO(PDO_DSN, MARIADB_USER, MARIADB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        printf("We had a problem: %s\n", $e->getMessage());
    }

}
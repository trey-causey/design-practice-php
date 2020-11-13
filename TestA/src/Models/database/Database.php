<?php namespace Models\database\Database;

use PDO;
use PDOException;

require_once __DIR__ . '/IDatabase.php';
require_once __DIR__ . '/../../../common/setup/config.inc.php';

class Database implements IDatabase {
    protected $db;

    public function __construct()
    {
        try {
        $this->db = new PDO(PDO_DSN, MARIADB_USER, MARIADB_PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            printf("We had a problem: %s\n", $e->getMessage());
        }
    }

    /**
     * @param $sql
     * @return false|\PDOStatement
     */
    public function query($sql)
    {
        return $this->db->query($sql);
    }

    /**
     * @param $sql
     * @return false|\PDOStatement
     */
    public function fetchAll($sql)
    {
        return $this->db->fetchAll($sql, PDO::FETCH_ASSOC);
    }

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }

    /**
     * @param PDO $db
     */
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }


    /*function loadDatabase()
    {
        try {
            $db = new PDO(PDO_DSN, MARIADB_USER, MARIADB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            printf("We had a problem: %s\n", $e->getMessage());
        }

    }*/
}
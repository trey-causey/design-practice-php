<?php namespace Models\database;

include __DIR__ . '/Database.php';

use PDO;

class testDB {
    /**
     * @var \Models\database\IDatabase $db
     */
    protected $db;

    function testThisDB()
    {
        $param = [];
        $this->db = new Database();
        $sql = "SELECT * FROM drivers";
        $q = $this->db->query($sql, $fetchStyle = PDO::FETCH_ASSOC, $param);
        $row = $q->fetchAll(PDO::FETCH_ASSOC);
        var_dump($row);
    }
}
$test = new testDB();
$test->testThisDB();



<?php namespace Models\database\Database;

include __DIR__ . '/Database.php';

use PDO;

class testDB {
    /**
     * @var \Models\database\Database\IDatabase $db
     */
    protected $db;

    function testThisDB()
    {
        $this->db = new Database();
        $sql = "SELECT * FROM drivers";
        $q = $this->db->query($sql);
        $row = $q->fetchAll(PDO::FETCH_ASSOC);
        var_dump($row);
    }
}
$test = new testDB();
$test->testThisDB();



<?php namespace app\controllers;

use App\Models\driver\Driver;
use Models\database\Database\Database;

include __DIR__ . '/../../src/Models/database/Database.php';

class testDatabase
{
    /**
     * @var \Models\database\Database\IDatabase $db
     */
    protected $db;

    function testingIt()
    {
        $this->db = new \Models\database\Database\Database();


    }
}

$db = new Database();
$driver = new Driver($db);
$client = $driver->GetDriverIdByCode('VER');
var_dump($client);
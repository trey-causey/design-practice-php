<?php namespace app\controllers;

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
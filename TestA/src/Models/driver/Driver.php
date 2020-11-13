<?php namespace App\Models\driver;

use Models\database\Database\IDatabase;

require_once __DIR__ . '/../database/IDatabase.php';

class Driver
{
    protected $driverId;

    /**
     * @var IDatabase $db;
     */
    protected $db;
    protected $driverRef;
    protected $number;
    protected $code;

    public function __construct(IDatabase $db, $driverRef)
    {
        $this->db = $db;
        $this->driverRef = $driverRef;
    }



}
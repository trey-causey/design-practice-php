<?php namespace App\Models\driver;

use Models\database\Database\Database;
use Models\database\Database\IDatabase;
use PDO;

require_once __DIR__ . '/../database/Database.php';

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

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function GetDriverByCode($code)
    {
        $sql = "SELECT * FROM drivers where code = ?";
        $param = [$code];
       $data = $this->db->query($sql, $fetchStyle = PDO::FETCH_ASSOC, $param);
       foreach ($data as $row)
       {
           var_dump($row);
       }

    }
}
$db = new Database();
$driver = new Driver($db);
$driver->GetDriverByCode('VER');

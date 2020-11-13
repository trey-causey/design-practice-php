<?php namespace Models\database\Database;

require_once __DIR__ . '/connectPdo.php';

interface IDatabase {

    /**
     * @param $sql
     * @throws \Exception
     * @return mixed
     */
    public function query($sql);

    /**
     * @param $sql
     * @return false|\PDOStatement
     * @return mixed
     */
    public function fetchAll($sql);
}

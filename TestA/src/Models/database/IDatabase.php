<?php namespace Models\database\Database;

require_once __DIR__ . '/connectPdo.php';

interface IDatabase {

    /**
     * @param $sql
     * @param $fetch_style
     * @param $params
     * @throws \Exception
     * @return mixed
     */
    public function query($sql, $fetch_style, $params = array());

}

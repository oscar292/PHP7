<?php

class Connection
{

    public $host = 'localhost';
    public $dbname = "db1";
    public $drive = "pgsql";
    public $password = "123456";
    public $user = "postgres";
    public $port = '5432';
    public $connect;


    public static function getConnection()
    {
        try {
            $connection = new Connection();
            $connection->connect = new PDO("{$connection->drive}:host={$connection->host};port={$connection->port};dbname={$connection->dbname}", $connection->user, $connection->password);
            $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection->connect;
        } catch (PDOException $err) {
            echo "Throw Error " . $err->getMessage();
        }
    }
}

<?php

class Database
{
    protected $instance = null;

    public function __construct()
    {
        $host = DATABASE['HOST'];
        $port = DATABASE['PORT'];
        $dbname = DATABASE['DBNAME'];

        try {
            $this->instance = new PDO(
                "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
                DATABASE['USER'],
                DATABASE['PASSWORD'],
            );

            $this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}

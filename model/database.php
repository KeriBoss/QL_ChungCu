<?php
class Database
{
    public static $connection = NULL;
    //1. Tạo Connection
    public function __construct()
    {
        if(!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, PORT);
            self::$connection->set_charset('utf8mb4');
        }
        return self::$connection;
    }

    //2. Execute Query
    public function select($sql)
    {
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
<?php

class DB
{
    private static $conn;

    public static function connectDB()
    {
        if (self::$conn == null)
            self::$conn = new mysqli('localhost', 'root', '', 'ordinacija');
        return self::$conn;
    }
}


try
{
    $conn = DB::connectDB();

    if(!$conn)
    {
        throw new Exception('Unable to connect');

    }  
}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>
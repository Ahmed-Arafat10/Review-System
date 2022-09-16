<?php

class DB
{
    private const host = "localhost";
    private const username = "root";
    private const password = "";
    private const database = "review";
    private $connect;

    public function __construct()
    {
        $this->connect = new mysqli(self::host, self::username, self::password, self::database);
    }

    /**
     * @return function
     */
    public function CheckError()
    {
        return !($this->connect->connect_errno) ? $this->DBError(1)  : $this->DBError(0);  
    }

    public function DBError($type)
    {
        if($type) echo "Done Connecting To DB";
        else echo $this->connect->connect_error;
    }

    /**
     * @return object
     */
    public function GetDB()
    {
        return $this->connect;
    }

    public function CloseDB()
    {
        $this->connect->close();
    }
}

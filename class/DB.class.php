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
        if ($type) echo "Done Connecting To DB";
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
/*
//connect
$mysqli = new mysqli($host, $user, $password, $db_name);

//prepare
$stmt = $mysqli->prepare("SELECT * FROM the_table WHERE field1= ? AND Field2= ?");

//Binding parameters. Types: s = string, i = integer, d = double,  b = blob
$params= array("ss","string_1","string_2");

//now we need to add references
$tmp = array();
foreach($params as $key => $value) $tmp[$key] = &$params[$key];
// now us the new array
call_user_func_array(array($stmt, 'bind_param'), $tmp);

$stmt->execute();


$res = $stmt->get_result();
while($row = $res->fetch_array(MYSQLI_ASSOC)) {
  $a_data[]=$row;
}
print_r($a_data);

$stmt->close();
*/
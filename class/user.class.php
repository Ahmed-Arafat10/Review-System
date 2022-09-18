<?php
require_once 'DB.class.php';

class User{

    private $con;

    public function __construct()
    {
        $db = new DB();
        $this->con = $db->GetDB();
    }

    /**
     * Create new account
     * @param $name
     * @param $password
     * @param $email
     * @return bool
     */
    public function SignUp($name,$password,$email)
    {
        $insert = "INSERT INTO `user` VALUES (NULL,?,?,?)";
        $query = $this->con->prepare($insert);
        $query->bind_param("sss",$name,$password,$email);
        $Check = $query->execute();
        if($Check) {
            echo "Done Creating Your Account";
            return 1;
        }
        echo "Something Went Wrong";
        return 0;
    }

    /**
     * @param $name
     * @param $password
     * @return array
     */
    public function SignIn($name,$password)
    {
        $temp = array($name,$password);
        return $this->GetUser(" WHERE `name` = ? AND `password` = ? ","signin" , $temp);
    }

     /**
     * @param $ID
     * @param $name
     * @param $password
     * @param $email
     * @return bool
     */
    public function UpdateUser($ID,$name,$password,$email)
    {
        $update = "UPDATE `user` SET `name` = ? ,  `password` = ? , `email` = ? WHERE `ID` = ?";
        $query = $this->con->prepare($update);
        $query->bind_param("sssi",$name,$password,$email,$ID);
        $Check = $query->execute();
        if($Check) {
            echo "Done Updating Your Account";
            return 1;
        }
        echo "Something Went Wrong";
        return 0;
    }


    /**
     * @param $ID
     * @return bool
     */
    public function DeleteUser($ID)
    {
        $delete = "DELETE FROM `user` WHERE `ID` = ?";
        $query = $this->con->prepare($delete);
        $query->bind_param("i",$ID);
        $Check = $query->execute();
        if($Check) {
            echo "Done Deleting Your Account";
            return 1;
        }
        echo "Something Went Wrong";
        return 0;
    }

    /**
     * @param $extra
     * @param $text
     * @param $temp
     * @return array|false
     */
    public function GetUsers($extra, $text, $temp)
    {
        $insert = "SELECT * FROM `user` ";
        if($extra != NULL) $insert .= $extra;
        $query = $this->con->prepare($insert);
        if($text == "signin") $query->bind_param("ss",$temp[0],$temp[1]);
        if($text == "id") $query->bind_param("i",$temp);
        $Check = $query->execute();
        if($Check) {
            $Result = $query->get_result();
            $Fetch = $Result->fetch_assoc();
            if($text != NULL) return $Fetch;
            $res = array();
            foreach($Result as $f)
            {
                $res[] = $f;
            }
            return $res;
        }
        echo "Something Went Wrong";
        return 0;
    }

    /**
     * @param $extra
     * @param $text
     * @param $temp
     * @return array|false
     */
    public function GetUser($extra, $text,$temp)
    {
        return $this->GetUsers($extra, $text, $temp);
    }


}
<?php
require_once 'DB.class.php';

class Message
{

    private $con;

    public function __construct()
    {
        $db = new DB();
        $this->con = $db->GetDB();
    }


    /**
     * Add new message
     * @param $title
     * @param $content
     * @param $name
     * @return bool
     */
    public function AddMessage($title, $content, $name, $email)
    {
        $insert = "INSERT INTO `message` VALUES (NULL,?,?,?,?)";
        $query = $this->con->prepare($insert);
        $query->bind_param("ssss", $title, $content, $name, $email);
        $Check = $query->execute();
        if ($Check) return 1;
        echo "Something Went Wrong";
        return 0;
    }


    /**
     * Add new product
     * @param $ID
     * @param $title
     * @param $content
     * @param $name
     * @param $email
     * @return bool
     */
    public function UpdateMessage($ID, $title, $content)
    {
        $update = "UPDATE `message` SET `title` = ? ,  `content` = ? 
        WHERE `ID` = ?";
        $query = $this->con->prepare($update);
        $query->bind_param("ssi", $title, $content,$ID);
        $Check = $query->execute();
        if ($Check) {
            echo "Done Updating Your Message";
            return 1;
        }
        echo "Something Went Wrong";
        return 0;
    }


    /**
     * @param $ID
     * @return bool
     */
    public function DeleteMessage($ID)
    {
        $delete = "DELETE FROM `message` WHERE `ID` = ?";
        $query = $this->con->prepare($delete);
        $query->bind_param("i", $ID);
        $Check = $query->execute();
        if ($Check) {
            echo "Done Deleting Your Product";
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
    public function GetMessages($extra, $text, $temp)
    {
        $insert = "SELECT * FROM `message` ";
        if ($extra != NULL) $insert .= $extra;
        $query = $this->con->prepare($insert);
        if ($text == "search") $query->bind_param("s", $temp);
        if ($text == "id") $query->bind_param("i", $temp);
        $Check = $query->execute();
        if ($Check) {
            $Result = $query->get_result();
            $Fetch = $Result->fetch_assoc();
            if ($text != NULL) return $Fetch;
            $res = array();
            foreach ($Result as $f) {
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
    public function GetMessage($extra, $text, $temp)
    {
        return $this->GetMessages($extra, $text, $temp);
    }
}

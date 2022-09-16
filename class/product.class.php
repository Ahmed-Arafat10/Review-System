<?php
require_once 'DB.class.php';

class Product
{

    private $con;

    public function __construct()
    {
        $db = new DB();
        $this->con = $db->GetDB();
    }


    /**
     * Add new product
     * @param $title
     * @param $content
     * @param $image
     * @param $price
     * @param $available
     * @param $user_id
     * @return bool
     */
    public function AddProduct($title, $content, $image, $price, $available, $user_id)
    {
        $insert = "INSERT INTO `product` VALUES (NULL,?,?,?,?,?,?)";
        $query = $this->con->prepare($insert);
        $query->bind_param("sssdii", $title, $content, $image, $price, $available, $user_id);
        $Check = $query->execute();
        if ($Check) {
            echo "Done Adding New Product";
            return 1;
        }
        echo $query->error;
        return 0;
    }


    /**
     * Add new product
     * @param $title
     * @param $content
     * @param $image
     * @param $price
     * @param $available
     * @param $user_id
     * @return bool
     */
    public function UpdateProduct($ID, $title, $content, $image, $price, $available, $user_id)
    {
        $update = "UPDATE `product` SET `title` = ? ,  `content` = ? , `image` = ? ,  `price` = ? , `available` = ? , `user_id` = ?
        WHERE `ID` = ?";
        $query = $this->con->prepare($update);
        $query->bind_param("sssdiii", $title, $content, $image, $price, $available, $user_id, $ID);
        $Check = $query->execute();
        if ($Check) {
            echo "Done Updating Your Product";
            return 1;
        }
        echo "Something Went Wrong";
        return 0;
    }


    /**
     * @param $ID
     * @return bool
     */
    public function DeleteProduct($ID)
    {
        $delete = "DELETE FROM `product` WHERE `ID` = ?";
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
    public function GetProducts($extra, $text, $temp)
    {
        $insert = "SELECT * FROM `product` ";
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
    public function GetProduct($extra, $text, $temp)
    {
        return $this->GetProducts($extra, $text, $temp);
    }

    public function SearchProduct($extra, $text, $temp)
    {
        return $this->GetProducts($extra, $text, $temp);
    }
}

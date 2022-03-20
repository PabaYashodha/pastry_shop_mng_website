<?php
include_once '../config/dbConnection.php';

class sandwich {
    private $db;

    public function __construct()
    {
        $this->db = new dbConnection();
    }
    public function getSandwichDataBySubCategory()
    {
        $conn = $this->db->connection();    
        $sql = "SELECT `food_item_id`,`food_item_name`, `food_item_unit_price`, `food_item_status`, `food_item_image` FROM `food_item` WHERE `sub_category_sub_category_id`='9'";
        $result = $conn->query($sql) or die($conn->error);
        return $result; 
    }
}
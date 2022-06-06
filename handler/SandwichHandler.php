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
        $sql = "SELECT `food_item_id`,`food_item_name`, `food_item_unit_price`,  `food_item_image` FROM `food_item` WHERE `sub_category_sub_category_id`='1' AND `food_item_status`='1'";
        $result = $conn->query($sql) or die($conn->error);
        return $result; 
    }
    public function getPastryDataBySubCategory()
    {
        $conn = $this->db->connection();    
        $sql = "SELECT `food_item_id`,`food_item_name`, `food_item_unit_price`,  `food_item_image` FROM `food_item` WHERE `sub_category_sub_category_id`='2' AND `food_item_status`='1'";
        $result = $conn->query($sql) or die($conn->error);
        return $result; 
    }
    public function getBurgerDataBySubCategory()
    {
        $conn = $this->db->connection();    
        $sql = "SELECT `food_item_id`,`food_item_name`, `food_item_unit_price`,  `food_item_image` FROM `food_item` WHERE `sub_category_sub_category_id`='3' AND `food_item_status`='1'";
        $result = $conn->query($sql) or die($conn->error);
        return $result; 
    }
    public function getBunDataBySubCategory()
    {
        $conn = $this->db->connection();    
        $sql = "SELECT `food_item_id`,`food_item_name`, `food_item_unit_price`,  `food_item_image` FROM `food_item` WHERE `sub_category_sub_category_id`='4' AND `food_item_status`='1'";
        $result = $conn->query($sql) or die($conn->error);
        return $result; 
    }
    public function getRollDataBySubCategory()
    {
        $conn = $this->db->connection();    
        $sql = "SELECT `food_item_id`,`food_item_name`, `food_item_unit_price`,  `food_item_image` FROM `food_item` WHERE `sub_category_sub_category_id`='5' AND `food_item_status`='1'";
        $result = $conn->query($sql) or die($conn->error);
        return $result; 
    }
    public function getPieDataBySubCategory()
    {
        $conn = $this->db->connection();    
        $sql = "SELECT `food_item_id`,`food_item_name`, `food_item_unit_price`,  `food_item_image` FROM `food_item` WHERE `sub_category_sub_category_id`='6' AND `food_item_status`='1'";
        $result = $conn->query($sql) or die($conn->error);
        return $result; 
    }
}
<?php

include_once '../config/dbConnection.php';
$db = new dbConnection();

function getFoodItemData($foodItemId)
{
    $conn = $GLOBALS['db']->connection();  //access the db from global variable  
    $sql = "SELECT `food_item_name`, `food_item_unit_price`,`food_item_image` FROM `food_item` WHERE `food_item_id`='$foodItemId'";
    $result = $conn->query($sql) or die($conn->error);
    return $result; 
}
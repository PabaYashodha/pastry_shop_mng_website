<?php 
include_once '../config/dbConnection.php';
$db = new dbConnection();
//set the status
if (isset($_REQUEST['status']) ){
    $status = $_REQUEST['status']; 
    $status(); //call the function
}
function getCustomerDetails($Id)
{
    $Id = base64_decode($Id);
    $conn = $GLOBALS['db']->connection();
    $sql = "SELECT `customer_fname`,`customer_lname`,`customer_contact`,`customer_email`,`customer_add1`,`customer_add2`,`customer_add3`,`customer_postal_code`
     FROM `customer` WHERE `customer_id` = '$Id'";
      $result = $conn->query($sql) or die($conn->error);
      return $result; 
}



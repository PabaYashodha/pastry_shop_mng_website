<?php 
session_start();
include_once '../config/dbConnection.php';
$db = new dbConnection();
//session_start();
//set the status
if (isset($_REQUEST['status']) ){
    $status = $_REQUEST['status']; 
    $status(); //call the function
}

function orderPlacement()
{
    try {
        $orderCustomerEmail = $_POST['orderCustomerEmail'];
        $orderCustomerFirstName=$_POST['orderCustomerFirstName'];
        $orderCustomerLastName = $_POST['orderCustomerLastName'];
        $orderCustomerContact = $_POST['orderCustomerContact'];
        $orderCustomerPostalCode = $_POST['orderCustomerPostalCode'];
        $orderCustomerAdd1 = $_POST['orderCustomerAdd1'];
        $orderCustomerAdd2 = $_POST['orderCustomerAdd2'];
        $orderCustomerAdd3 = $_POST['orderCustomerAdd3'];
        $total=$_POST['total'];
        
        if ($orderCustomerEmail=="") {
            throw new Exception("email is required");
        }
        if ($orderCustomerFirstName=="") {
            throw new Exception("First name is required");
        }
        if ($orderCustomerLastName=="") {
            throw new Exception("First name is required");
        }
        if ($orderCustomerContact=="") {
            throw new Exception("Contact is required");
        }
        if ($orderCustomerPostalCode=="") {
            throw new Exception("Postal coe is required");
        }
        if ($orderCustomerAdd1=="") {
            throw new Exception("Address no is required");
        }
        if ($orderCustomerAdd2=="") {
            throw new Exception("Street is required");
        }
        if ($orderCustomerAdd3=="") {
            throw new Exception("City is required");
        }
        if ($total=="") {
            throw new Exception("Total is required");
        }
        $conn = $GLOBALS['db']->connection();
        $customerId =base64_decode($_SESSION['customer']['customer_id']) ;
        print_r($customerId);
        $sql = "INSERT INTO `invoice`(`invoice_sub_amount`,`invoice_net_total`,`invoice_recieve_amount`,`invoice_type`,`invoice_made_by`) VALUES('$total','$total','$total','online','$customerId')";
        $conn->query($sql) or die($conn->error);
        $insertId =$conn->insert_id;
        if ($insertId>0) {
            $sql = "INSERT INTO `ordertb` (`ordertb_cus_fname`, `ordertb_cus_lname`, `ordertb_cus_contact`, `ordertb_cus_add1`, `ordertb_cus_add2`, `ordertb_cus_add3`, `ordertb_cus_postal_id`, `ordertb_cus_email`,`invoice_invoice_id`)
         VALUES ('$orderCustomerFirstName', '$orderCustomerLastName', '$orderCustomerContact', '$orderCustomerAdd1', '$orderCustomerAdd2', '$orderCustomerAdd3', '$orderCustomerPostalCode','$orderCustomerEmail','$insertId')"; 
        $conn->query($sql) or die($conn->error); 
        $orderId = $conn->insert_id;
        if ($orderId>0) {
        
            foreach($_SESSION['shopping_cart'] as $value){//access session
               
                $id = $value['food_item_id'];
                $qty = $value['item_qty'];
                $sql = "SELECT `food_item_unit_price` FROM `food_item` WHERE `food_item_id`= '$id'";
                $result = $conn->query($sql) or die($conn->error);
                $unitPrice = $result->fetch_assoc();
                $price = $unitPrice['food_item_unit_price'];
                $sql = "INSERT INTO `food_item_has_ordertb`(`food_item_food_item_id`, `ordertb_ordertb_id`,`food_item_has_ordertb_qty`,`food_item_has_ordertb_product_price`)
                VALUES ('$id','$orderId','$qty','$price')";
                $conn->query($sql) or die($conn->error);
            };
             header('location:../pages/payment.php');
        }

   }
    } catch (Exception $th) {
        $msg = $th->getMessage();
        $type= "Error";
        $array = array("type"=>$type, "msg"=>$msg);
        $_SESSION['notify']=$array;
        header('location: ../pages/checkout.php');
    }
}


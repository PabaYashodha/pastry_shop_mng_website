<?php 
include_once '../config/dbConnection.php';
$db = new dbConnection();
session_start();
//set the status
if (isset($_REQUEST['status']) ){
    $status = $_REQUEST['status']; 
    $status(); //call the function
}
function newCustomer()
{
   // if (isset($_SESSION['otp'])) {
       
    
    try {
        $customerEmail = $_POST['customerEmail'];
        $confirmPassword = md5($_POST['confirmPassword']);
        $customerFirstName = $_POST['customerFirstName'];
        $customerLastName = $_POST['customerLastName'];
        $customerContact = $_POST['customerContact'];
        $customerPostalCode = $_POST['customerPostalCode'];
        $customerAdd1 = $_POST['customerAdd1'];
        $customerAdd2 = $_POST['customerAdd2'];
        $customerAdd3 = $_POST['customerAdd3'];

        if ($customerEmail== "") {
            throw new Exception("email is required");
        }
        if ($confirmPassword=="") {
            throw new Exception("Password is required");
        }
        if ($customerFirstName=="") {
            throw new Exception("First name is required");
        }
        if ($customerLastName=="") {
            throw new Exception("Last name is required");
        }
        if ($customerContact=="") {
            throw new Exception("Contact is required");
        }
        if ($customerPostalCode=="") {
            throw new Exception("Postal coe is required");
        }
        if ($customerAdd1=="") {
            throw new Exception("Address no is required");
        }
        if ($customerAdd2=="") {
            throw new Exception("Street is required");
        }
        if ($customerAdd3=="") {
            throw new Exception("City is required");
        }
    $conn = $GLOBALS['db']->connection();  //access the db from global variable  
    $sql = "INSERT INTO `customer`(`customer_fname`, `customer_lname`, `customer_contact`, `customer_email`, `customer_add1`, `customer_add2`, `customer_add3`, `customer_postal_code`) 
            VALUES ( '$customerFirstName', '$customerLastName', '$customerContact', '$customerEmail', '$customerAdd1', '$customerAdd2', '$customerAdd3', '$customerPostalCode')";
    $conn->query($sql) or die($conn->error);
    $insertId =  $conn->insert_id; //return insert id 
    if ($insertId >0) {
        $sql = "INSERT INTO `customer_login`(`customer_login_username`, `customer_login_password`,`customer_customer_id`) VALUES('$customerEmail','$confirmPassword','$insertId')";
        $result=$conn->query($sql) or die($conn->error);
        if ($result>0) { //success part
            session_unset('otp');
            $msg = "New customer successfully inserted";
            $type = "Success";
            $array = array("type"=>$type, "msg"=>$msg);
            // session_start();
            $_SESSION['notify'] = $array;
            header('location: ../pages/dashboard.php');
        }else{
            throw new Exception("Customer not inserted");
        }
    }else{
        throw new Exception("Customer not inserted");
    }

    } catch (Exception $th) { //error part
       $msg = $th->getMessage();
       $type = "Error";
       $array = array("type"=>$type, "msg"=>$msg);
            
       $_SESSION['notify'] = $array;
       header('location: ../pages/register.php');
    }
    
//}
    
}
<?php 
include_once '../config/dbConnection.php';
$db = new dbConnection();
 session_start();

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    $status();
}
function customerLogin()
{
    try {
        echo $username = $_POST["username"];
       echo $password = md5($_POST["password"]) ;

        if ($username=="") {
            throw new Exception("Username is required");
        }
        if ($password=="") {
            throw new Exception("Password is required");
        }
        $conn = $GLOBALS['db']->connection();  //access the db from global variable
        $sql = "SELECT 1 FROM `customer_login`WHERE `customer_login_username`= '$username' AND `customer_login_password`= '$password'";
        $result = $conn->query($sql) or die($conn->error);
        print_r($result);
        if ($result->num_rows>0) {
            $msg = "Successfully logged in";
            $type ="Success";
            $array = array("type"=> $type ,"msg"=>$msg);
            $_SESSION['notify']=$array;
             header("location:../pages/dashboard.php");
        }else{
            throw new Exception("User credentials not match");
        }

    } catch (Throwable $th) {
        $msg = $th->getMessage();
        $type = "Error";
        $array = array("type"=>$type, "msg"=>$msg);
        $_SESSION['notify'] = $array;
         header('location:../pages/login.php');

    }
}
function sendOTP()
{
    $customerContact = $_POST['customerContact'];
    $pattern= "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
    if (preg_match($pattern,$customerContact)) {
        
    }else{
        
    }
}
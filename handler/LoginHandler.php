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
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        if ($username=="") {
            throw new Exception("Username is required");
        }
        if ($password=="") {
            throw new Exception("Password is required");
        }
        if (isset($_SESSION['otp'])) {
            if ($_SESSION['otp']['email']==$username && $_SESSION['otp']['otp']==($password)){
                header("location: ../pages/register.php?email=".$username );
            }else{
                throw new Exception("Provided email or OTP not valid");
            }
        }else{
            $conn = $GLOBALS['db']->connection();  //access the db from global variable
            $sql = "SELECT `customer_customer_id` FROM `customer_login` WHERE `customer_login_username`= '$username' AND `customer_login_password`= '$password'";
            $result = $conn->query($sql) or die($conn->error);
                        
            if ($result->num_rows>0) {
               $customerId = $result->fetch_assoc();
               $Id =$customerId["customer_customer_id"];
               
                $sql = "SELECT `customer_fname`, `customer_lname` FROM `customer` WHERE `customer_id` = '$Id'";
                $result = $conn->query($sql) or die($conn->error);
                $customerDetail = $result->fetch_assoc();
                $firstName = $customerDetail["customer_fname"];
                $lastName = $customerDetail["customer_lname"];
                $customerArray = array(
                    "customer_fname"=> $firstName,
                    "customer_lname"=> $lastName,
                    "customer_id"=> base64_encode($Id)
                );
                $_SESSION['customer'] =$customerArray; //login session for customer

                $msg = "Successfully logged in";
                $type ="Success";
                $array = array("type"=> $type ,"msg"=>$msg);
                $_SESSION['notify']=$array;
                if(isset($_SESSION['shopping_cart'])):
                    header("location:../pages/checkout.php");
                else:
                    header("location:../pages/dashboard.php"); //go to the dashboard ho directly login without going cart
                endif;
            }else{
                throw new Exception("User credentials not match");
            }
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
        include 'EmailHandler.php';
        $mailObj = new EmailHandler();
        $otp  = rand(10000,99999);
        $subject = "Email verification code";
        $body = "
            <h5> Your verification code is ".$otp." </h5>
            <br>
            <h4>Notice:</h4>
            <br>
            <h5>Use this as your 'Temporary Password'</h5>
            
            <h5>This code will be expires after 90 min</h5>
        ";
        $mailSendResult = $mailObj->sendMail($customerContact, 'customer', $subject, $body);
        if ($mailSendResult==1) {
            $array = array(
                "email" => $customerContact,
                "otp" => md5($otp) ,
            );
            $notifyArray = array(
                "msg" => "Mail has been send",
                "type" => "Success"
            );
            $_SESSION['notify'] = $notifyArray;
            $_SESSION['otp'] = $array;
            header("location:../pages/login.php");
        }else{
            $array = array(
                "msg" => "Opps! Mail send failed Please check Your email",
                "type" => "error",
            );
            $_SESSION['notify'] = $array;
            header("location:../pages/login.php");
        }
            
    }else{
        
    }
}

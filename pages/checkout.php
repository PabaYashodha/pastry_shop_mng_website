<?php
require_once '../pages/header.php';
if(!isset($_SESSION['customer'])){
    header('location: login.php');
}else{
?>





<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php';
}
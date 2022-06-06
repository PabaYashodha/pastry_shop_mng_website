<?php
include_once '../config/dbConnection.php';
$db = new dbConnection();
//session_start();

if (isset($_REQUEST['status'])) {
    $status = $_REQUEST['status'];
    $status();
}

function getOrderDetailsMadeById($Id)
{
    $Id = base64_decode($Id);
    $conn = $GLOBALS['db']->connection();
    $sql = "SELECT `i`.`invoice_id`, `i`.`invoice_date`, `o`.`ordertb_status` FROM `invoice` `i`, `ordertb`  `o` WHERE `i`.`invoice_id`=`o`.`invoice_invoice_id` AND `i`.`invoice_made_by` = '$Id'";
    $getOrderDetailsMadeById = $conn->query($sql) or die($conn->error);
    return $getOrderDetailsMadeById;
}

function getInvoiceDetails()
{
    $invoiceId = $_POST['invoiceId'];
    $conn = $GLOBALS['db']->connection();
    $sql = "SELECT `i`.`invoice_id`, `i`.`invoice_date`, `i`.`invoice_net_total`, `o`.*  FROM `invoice` `i` , `ordertb` `o` WHERE `i`.`invoice_id`=`o`.`invoice_invoice_id` AND `i`.`invoice_id`='$invoiceId'";
    $getInvoiceDetail = $conn->query($sql) or die($conn->error);
    $invoiceDetails = $getInvoiceDetail->fetch_assoc();
    $orderId = $invoiceDetails['ordertb_id'];
    $sql2 = "SELECT `foodItem`.`food_item_name`, `foodItem`.`food_item_unit_price`, `foodItem`.`food_item_image`, `foodHasOrder`.* FROM `food_item` `foodItem`, `food_item_has_ordertb` `foodHasOrder`
     WHERE `foodItem`.`food_item_id`= `foodHasOrder`.`food_item_food_item_id` AND `foodHasOrder`.`ordertb_ordertb_id`= '$orderId'";
    $getOrderItemDetails = $conn->query($sql2) or die($conn->error);
//   print_r($getOrderItemDetails);

    $html = '    
    <div class="row">
        <label for="name" class="col-sm-4 col-form-label">Invoice Id:'.$invoiceId.'</label>
        <label for="name" class="col-sm-4 col-form-label">Invoice Date:'. $invoiceDetails['invoice_date'].'</label>
        <label for="name" class="col-sm-4 col-form-label">Net Total:'. $invoiceDetails['invoice_net_total'].'</label>                         
    </div>
    <hr>
    <table class="table table-striped">
        <thead style="background-color: #e69284;">
            <th>Image</th>
            <th>Food Item Name</th>
            <th>Food Item Unit Price</th>
            <th>Food Item Quantity</th>
        </thead>
        <tbody>';
        while($orderItemDetails = $getOrderItemDetails->fetch_assoc()){
            $html .= '<tr>
                <td><img src="../../pastry_shop_mng_sys/images/foodItem-images/'.$orderItemDetails['food_item_image'].'" alt="" width="70px" height="70px"></td>
                <td>'.$orderItemDetails['food_item_name'].'</td>
                <td>'.$orderItemDetails['food_item_unit_price'].'</td>
                <td>'.$orderItemDetails['food_item_has_ordertb_qty'].'</td>
                </tr>';
            }
        $html .= '</tbody>
    </table>
    ';

   echo json_encode(base64_encode($html));
}

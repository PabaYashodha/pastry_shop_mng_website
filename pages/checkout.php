<?php
require_once '../handler/CartHandler.php';
require_once '../pages/header.php';

//session_start();
// session_unset();
if (!isset($_SESSION['customer'])) {
    header('location: login.php');
} else {

?>
    <section style="min-height: 100vh;">

        <div class="container p-o" style="margin-top: 100px;">
            <form action="../handler/OrderHandler.php?status=orderPlacement" method="post" role="form" id="orderCustomerForm" class="mx-2 mt-1 needs-validation" novalidate>
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                        include_once '../handler/CheckoutHandler.php';
                        $getCustomerDetails = getCustomerDetails($_SESSION['customer']['customer_id']);
                        $details = $getCustomerDetails->fetch_assoc();
                        ?>
                        <h4>Customer Details</h4>
                        <div class="row">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="orderCustomerEmail" class="form-label">Email<i class="text-danger">*</i></label>
                                    <input type="email" class="form-control" id="orderCustomerEmail" name="orderCustomerEmail" onchange="emailValidate(); " required value="<?php echo $details['customer_email'] ?>" readonly>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="orderCustomerFirstName" class="form-label">First Name<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control" id="orderCustomerFirstName" name="orderCustomerFirstName" required value="<?php echo $details['customer_fname'] ?>">
                                    <div class="invalid-feedback">
                                        Field is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="orderCustomerLastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="orderCustomerLastName" name="orderCustomerLastName" value="<?php echo $details['customer_lname'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="orderCustomerContact" class="form-label">Contact<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control" id="orderCustomerContact" name="orderCustomerContact" required value="<?php echo $details['customer_contact'] ?>">
                                    <div class="invalid-feedback">
                                        Field is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="orderCustomerPostalCode" class="form-label">Postal Code<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control" id="orderCustomerPostalCode" name="orderCustomerPostalCode" required value="<?php echo $details['customer_postal_code'] ?>">
                                    <div class="invalid-feedback">
                                        Field is required
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="orderCustomerAddress" class="form-label">Address<i class="text-danger">*</i></label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-3">
                                    <input type="text" class="form-control" id="orderCustomerAdd1" name="orderCustomerAdd1" placeholder="No" required value="<?php echo $details['customer_add1'] ?>">
                                    <div class="invalid-feedback">
                                        Field is required
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <input type="text" class="form-control" id="orderCustomerAdd2" name="orderCustomerAdd2" placeholder="street" required value="<?php echo $details['customer_add2'] ?>">
                                    <div class="invalid-feedback">
                                        Field is required
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <input type="text" class="form-control" id="orderCustomerAdd3" name="orderCustomerAdd3" placeholder="city" required value="<?php echo $details['customer_add3'] ?>">
                                    <div class="invalid-feedback">
                                        Field is required
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h4>Cart Details</h4>
                        <table class="table table-striped">
                            <thead style="background-color: #e69284;">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Food Item</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody style="height: 50vh !important; overflow-y: scroll;">
                                <?php
                                $count = 1;
                                foreach ($_SESSION['shopping_cart'] as $value) { //access the shopping cart session
                                    $result = getFoodItemData($value['food_item_id']);
                                    $total = 0;                                    
                                    $data = $result->fetch_assoc();
                                    $subTotal = $value['item_qty'] * $data['food_item_unit_price'];
                                    $total += $subTotal;                                        
                                ?> 
                                <tr>
                                    <td scope="col"><?php echo $count ?></td>
                                    <td scope="col"><?php echo $data['food_item_name'] ?></td>
                                    <td scope="col"><?php echo $data['food_item_unit_price'] ?></td>
                                    <td scope="col"><?php echo $value['item_qty'] ?></td>
                                    <td scope="col"><?php echo ($value['item_qty'] * $data['food_item_unit_price']) ?>.00</td>
                                </tr>
                                <?php    
                                $count++;                         
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #e69284;">
                                    <td colspan="4" class="text-end">Total</td>
                                    <td><input type="hidden" name="total" value="<?php echo $total?>"><?php echo $total?>.00 </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="float-end d-inline-flex">
                            <a href="../pages/menu.php" class="btn btn-dark ">Add More Items</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button id="orderCustomerFormSubmit" type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>






<?php
    require_once '../pages/footer.php';
    require_once '../pages/scriptInclude.php';
}

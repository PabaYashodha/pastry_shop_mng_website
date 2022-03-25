<?php
require_once '../pages/header.php';
require_once '../handler/CartHandler.php';
?>
<section style="min-height: 100vh;">
    <div class="card" style="border: none; margin-top: 60px;">
        <div class="card-body cart-header" style="border: none;">
            <h2 class="text-center">MR.PAAN</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body" style="margin: 50px;">
            <?php
            if (isset($_SESSION['shopping_cart'])) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Food Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $rowNum = 1;
                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
                            $result = getFoodItemData($value['food_item_id']);
                            //var_dump($result);
                            while ($row = $result->fetch_assoc()) {
                                $subTotal = $row['food_item_unit_price'] * $value['item_qty'];
                        ?>
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col"><img src="../../pastry_shop_mng_sys/images/foodItem-images/<?php echo $row['food_item_image']; ?>" alt="" width="70px" height="70px"></td>
                                    <td scope="col"><?php echo $row['food_item_name']; ?></td>
                                    <td scope="col" id="unit_price_<?php echo $rowNum ?>"><?php echo $row['food_item_unit_price']; ?></td>
                                    <td>
                                        <div class="input-group mb-3" style="width: 50%;">
                                            <button class="input-group-text" onclick="increase(<?php echo $rowNum ?>)" id="increaseBtn_<?php echo $rowNum ?>">+</button>
                                            <input type="text" id="quantity_<?php echo $rowNum ?>" class="form-control" style="width: 8px;" readonly value="<?php echo $value['item_qty']; ?>">
                                            <button class="input-group-text" onclick="decrease(<?php echo $rowNum ?>)" id="decreaseBtn_<?php echo $rowNum ?>">-</button>
                                        </div>
                                    </td>
                                    <td scope="col" id="subTotal_<?php echo $rowNum ?>"><?php echo $subTotal; ?>.00</td>
                                </tr>
                        <?php
                        $rowNum++;
                                $total += $subTotal;
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="5" class="text-end">Total</td>
                            <td  id="total"><?php echo $total; ?>.00 </td>
                        </tr>
                    </tbody>
                </table>
                <div>
            <a type="button" class="btn btn-dark float-end" href="../pages/checkout.php">Checkout</a>
        </div>
        </div>
            <?php
            } else {
            ?>
                <h5 class="text-center">Shopping cart is empty &#128533;</h5>
                <div class="d-grid gap-2 col-1 mx-auto">
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-dark">Go Back</a>
                </div>
            <?php
            }
            ?>
        
        
    </div>    
</section>
<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php';
?>
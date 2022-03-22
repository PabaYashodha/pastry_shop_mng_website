<?php
require_once '../pages/header.php';
require_once '../handler/CartHandler.php';
?>
<section style="min-height: 100vh;">
    <div class="card" style="border: none;">
        <div class="card-body cart-header" style="border: none;">
            <h2 style="text-align: center;">MR.PAAN</h2>
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
                        $total =0;
                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
                            $result = getFoodItemData($value['food_item_id']);
                            //var_dump($result);
                            while ($row = $result->fetch_assoc()) {
                                $subTotal = $row['food_item_unit_price'] * $value['item_qty'];
                        ?>
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col"><?php echo $row['food_item_image'];?></td>
                                    <td scope="col"><?php echo $row['food_item_name']; ?></td>
                                    <td scope="col"><?php echo $row['food_item_unit_price'];?></td>
                                    <td scope="col"><?php echo $value['item_qty'];?></td>
                                    <td scope="col"><?php echo $subTotal;?></td>
                                </tr>

                        <?php
                        $total += $subTotal;
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="5" class="text-end">Total</td>
                            <td><?php echo $total;?> </td>
                        </tr>
                    </tbody>
                </table>
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
    </div>
</section>
<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php';
?>
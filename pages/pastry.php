<?php
require_once '../pages/header.php';
include_once '../handler/SandwichHandler.php';
$sandwichObj = new sandwich();

//start te session
// session_start();
print_r($_SESSION['shopping_cart']);
// unset($_SESSION['shopping_cart']);

?>
<section style="min-height: 100vh;">
    <div class="container" style="margin-top: 100px;margin-bottom: 50px;">
        <div class="row ">

            <?php
            $result = $sandwichObj->getPastryDataBySubCategory();
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-md-3">

                    <div class="card" style="width: fit-content; margin-bottom: 20px; border:none;">
                        <div class="card-body">
                            <img src="../../pastry_shop_mng_sys/images/foodItem-images/<?php echo $row['food_item_image']; ?>" alt="" width="250px" height="200px" style="text-align: center;" class="rounded-3">
                            <h5 class="card-title text-center" style="font-weight:bold;"><?php echo $row['food_item_name']; ?></h5>
                            <h6 class="card-title text-center">Rs.<?php echo $row['food_item_unit_price']; ?></h6>
                            <span class="d-flex">
                                <button type="button" onclick="addToCart('<?php echo base64_encode($row['food_item_id']); ?>')" class="cart-btn rounded-pill px-2 shadow mx-auto">Add to Cart <i class="far fa-shopping-cart"></i></button>
                            </span>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php';
?>
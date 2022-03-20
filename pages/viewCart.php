<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../resources/fontawesome/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>
<section style="min-height: 100vh;">
<div class="card" style="border: none;">
    <div class="card-body cart-header" style="border: none;">
        <h2 style="text-align: center;">MR.PAAN</h2>
    </div>
</div>
<div class="card">
    <div class="card-body" style="margin: 50px;">
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
                if (!empty($_SESSION["shopping_cart"])) {
                    $total=0;
                    foreach ($_SESSION["shopping_cart"] as $key => $value) {
                ?>
                <tr>
                <td scope="row"><button type="button" class="btn btn-outline-danger btnCartItemDelete">&cross;</button></i></td> 
                <td></td>
                <td><?php echo $value["food_item_name"];?></td>      
                <td><?php echo $value["food_item_unit_price"];?></td>
                <td><?php echo $value["food_item_quantity"];?></td>
                <td><?php echo number_format($value["food_item_quantity"]*$value["food_item_unit_price"],2);?></td>
                </tr>
                <?php
                    $total = $total + ($value["food_item_quantity"]*$value["food_item_unit_price"]);
                    }
                ?>
                <tr>
                        <td colspan="5" class="text-end">Total</td>
                        <td ><?php echo number_format($total,2);?></td>
                </tr>
            </tbody>
                   <?php }?>
                
                
           
            
        </table>
    </div>
</div>
</section>
<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php';
?>
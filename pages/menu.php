<?php
require_once '../pages/header.php';
?>
<section  id="menu" style="min-height: 100vh;">
        <div class="container" style="margin-top:120px; margin-bottom:50px">
            <div class="row row-cols-2">
                <div class="col pb-2">
                    <div class="card savoryCorner-card">
                        <div class="card-img-overlay">
                            <a class="stretched-link itemTag" href="../pages/savory.php">Savory Corner</a>
                        </div>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="row">
                        <div class="col pb-1">
                            <div class="card sweetCorner-card">
                                <div class="card-img-overlay">
                                    <a class="stretched-link itemTag" href="../pages/sweet.php">Sweet Corner</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card drinkCorner-card" style="margin-top:10px;">
                                <div class="card-img-overlay">
                                    <a class="stretched-link itemTag" href="../pages/drink.php"> Drink Corner</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="row">
                        <div class="col">
                            <div class="card breadCorner-card">
                                <div class="card-img-overlay">
                                    <a class="stretched-link itemTag" href="../pages/bread.php"> Bread Corner</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card vegetarianCorner-card" style="margin-top:10px;">
                                <div class="card-img-overlay">
                                    <a class="stretched-link itemTag" href="../pages/vegetarian.php"> Vegetarian Corner</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col pt-2 ps-0">
                    <div class="card cakeCorner-card">
                        <div class="card-img-overlay">
                            <a class="stretched-link itemTag" href="../pages/cake.php"> Cake Corner</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php';
?>
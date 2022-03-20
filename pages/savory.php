<?php require_once '../pages/header.php' ?>

<section style="min-height: 100vh;">
<div class="container mt-5">

    <div class="row row-cols-2 p-5">
        <div class="col card sandwich-card card-img">
                <a class="stretched-link itemTag" href="../pages/sandwich.php" name="subCategorySandwich">Sandwiches</a>
        </div>
        <div class="col mt-4 card pastry-card card-img">
                <a class="stretched-link itemTag" href="../pages/pastry.php">Pastries & Croissants</a>
        </div>
        <div class="col mt-4 card burger-card card-img">
                <a  class="stretched-link itemTag" href="../pages/burger.php">Burgers</a>
        </div>
        <div class="col mt-4 card bun-card card-img">
                <a class="stretched-link itemTag" href="../pages/bun.php">Buns</a>
        </div>
        <div class="col mt-4 card roll-card card-img">
                <a class="stretched-link itemTag" href="../pages/roll.php">Rolls & Cutlet</a>
        </div>
        <div class="col mt-4 card pie-card card-img">
                <a class="stretched-link itemTag" href="../pages/pie.php">Pies & Tarts</a>
        </div>
    </div>

</div>
</section>
<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php'
?>
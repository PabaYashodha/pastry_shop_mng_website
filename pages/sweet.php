<?php require_once '../pages/header.php' ?>

<section style="min-height: 100vh;">
<div class="container" style="margin-top: 100px;margin-bottom: 50px;">
    <div class="row row-cols-2">
        <div class="col pb-2">
            <div class="card cake-card card-img">
                    <a class="stretched-link itemTag" href="../pages/cake.php">Eclairs</a>
            </div>
        </div>
        <div class="col ps-0">
            <div class="row">
                <div class="col pb-1">
                    <div class="card muffins-card card-img">
                            <a class="stretched-link itemTag" href="../pages/muffins.php">Muffins</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card doughnut-card card-img" style="margin-top:10px;">
                            <a class="stretched-link itemTag" href="../pages/doughnuts.php"> Doughnuts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php'
?>
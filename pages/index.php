<?php
require_once '../pages/header.php';
?>
<section style="min-height: 100vh;">
    <!-- <div class="image"></div> -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/submarine.jpg" style="height: 625px;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img/healthy-avocado-smoothie.jpg" style="height: 625px;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img/cakes pieces.jpg" style="height: 625px;" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container p-3">
        <div class="row">
            <div class="row">
                <h2 style="text-align: center;color: #a93723;">Need a coffee break?</h2>
            </div>
            <div class="col text-center p-4">
                <button type="button" class="btn position-relative btnOrder">ORDER NOW</button>
            </div>
        </div>
    </div>
    <section id="menu">
        <div class="container">
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
        <div class="container p-5 ">
            <div class="row">
                <div class="row">
                    <p id="footer-sentence">Experience the best of baking with MR.PAAN
                    <p>
                </div>
            </div>
            <!-- <div class="row">
        <div class="col">
            
        </div>
        <div class="col"><img src="../img/coffee.jpg"></div>
        <div class="col"></div>
        <div class="col"></div>
    </div> -->
        </div>
    </section>
</section>
    <?php
    require_once '../pages/footer.php';
    require_once '../pages/scriptInclude.php';
    ?>
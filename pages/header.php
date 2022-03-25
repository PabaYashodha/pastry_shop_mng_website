<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../resources/fontawesome/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../resources/toastr/build/toastr.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>

<body>
    <section id="header">
        <nav class="navbar navbar-inverse navbar-expand-md navbar-dark fixed-top navHeader" style="background: linear-gradient(to bottom, #e69284 0%, #f2c7c0 100%);">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-item nav-link px-5" href="../pages/index.php">HOME</a>
                    <a class="nav-item nav-link px-5" href="#menu">MENU</a>
                    <a class="nav-item nav-link px-5" href="#">CONTACT US</a>
                    <a class="nav-item nav-link px-5" href="#">ORDER ONLINE</a>
                    <a class="nav-item nav-link px-5 position-relative" href="viewCart.php"><i class="far fa-shopping-cart"></i>
                        <span class="position-absolute top-5 start-90 translate-middle badge rounded-pill bg-danger">
                            <div id="foodItemCountInCart">
                                <?php  

                                    // session_start();
                                if(isset($_SESSION['shopping_cart'])) {
                                    echo count($_SESSION['shopping_cart']);
                                } else{ echo '0'; }
                                     ?>
                            </div>
                        <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </div>
            </div>
        </nav>
    </section>
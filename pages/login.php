<?php
require_once '../pages/header.php';
?>
<section style="height:400px;">
    <div class="container p-o" style="margin-top: 100px;">
        <div class="row">
            <div class="col-sm-6">
                <form action="../handler/LoginHandler.php?status=customerLogin" method="post" role="form" id="customerLoginForm">
                    <div class="card login" style="border: none;">
                        <div class="card-body">
                            <h2 class="text-center" style="font-family: 'Lobster', cursive; color:#e69284;">...login...</h2>
                            <div class="mb-3">
                                <!-- <label for="username" class="form-label">Username</label> -->
                                <input type="text" class="form-control rounded-pill" id="username" placeholder="Username" name="username">
                            </div>
                            <div class="mb-3">
                                <!-- <label for="password" class="form-label">Password</label> -->
                                <input type="password" class="form-control rounded-pill" id="password" placeholder="Password" name="password">
                            </div>
                            <div class="d-grid">
                                <button class="btn rounded-pill text-dark" style="background-color:#e69284 ; box-shadow: 0 0 0 0.25rem #e69284 !important;" type="submit">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class=" col-sm-1 vl"></div>
            <div class="col-sm-6">
                <form action="../handler/LoginHandler.php?status=sendOTP" method="post" role="form">
                    <div class="card " style="border: none;">
                        <div class="card-body">
                            <h2 class="text-center" style="font-family: 'Lobster', cursive; color:#e69284;">...Register...</h2>
                            <div class="mb-3">
                                <!-- <label for="username" class="form-label">Username</label> -->
                                <input type="email" class="form-control rounded-pill" id="customerContact" name="customerContact" placeholder="email">
                            </div>

                            <div class="d-grid">
                                <button class="btn rounded-pill text-dark" style="background-color:#e69284 ; box-shadow: 0 0 0 0.25rem #e69284 !important;" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php

// require_once '../pages/scriptInclude.php';
require_once '../pages/footer.php';

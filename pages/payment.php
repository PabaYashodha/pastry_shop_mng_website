<?php
require_once '../pages/header.php';
?>
<section style="min-height: 100vh;">
    <div class="container" style="margin-top: 100px; width:36rem;">
        <h4>Card Details</h4>
        <div class="card" style="border: none;">

            <div class="row">
                <form class="row g-3">
                    <div class="col-12">
                        <label for="cardHolder'sName" class="form-label">Card Holder's Name</label>
                        <input type="text" class="form-control" id="cardHolder'sName">
                    </div>
                    <div class="col-12">
                        <label for="cardNumber" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber">
                    </div>
                    <div class="col-12">
                        <label for="nameOnCard" class="form-label">Name on Card</label>
                        <input type="text" class="form-control" id="nameOnCard">
                    </div>
                    <div class="col-md-6">
                        <label for="cvc" class="form-label">CVC</label>
                        <input type="number" class="form-control" id="cvc">
                    </div>
                    <div class="col-md-6">
                        <label for="expireDate" class="form-label">Crd Expiry Date</label>
                        <input type="month" class="form-control" id="expireDate">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="float-end d-inline-flex">
                            <a href="../pages/checkout.php" class="btn btn-danger">Cancel</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button id="paymentForm" type="submit" class="btn btn-primary">Pay</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php';
?>
<?php
require_once '../pages/header.php';
?>
<style>
    .form-control {
        border-top: 0px;
        border-bottom: 1px solid;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px;
    }

    .form-control:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #e69284 !important;
    }
</style>
<section style="min-height: 100vh;">
    <div class="card mx-auto w-50 mb-3" style="margin-top: 70px; border:none">

        <div class="card-body cart-header" style="border: none;">
            <h2 class="text-center">MR.PAAN</h2>
        </div>
        <div class="card text-dark bg-light" style="border:none">
            <h5 class="text-center fst-italic">New Customer Registration</h5>
            <p class="text-center fst-italic">Please fill out the information below to register as a new customer </p>
        </div>
        <div>
            <p class="text-danger mx-2">* required fields </p>
        </div>
        <form action="../handler/CustomerHandler.php?status=newCustomer" method="post" role="form" id="customerForm" class="mx-2 mt-1 needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="customerEmail" class="form-label">Email<i class="text-danger">*</i></label>
                    <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="newPassword" class="form-label">New Password<i class="text-danger">*</i></label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password<i class="text-danger">*</i></label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="customerFirstName" class="form-label">First Name<i class="text-danger">*</i></label>
                    <input type="text" class="form-control" id="customerFirstName" name="customerFirstName" required>
                    <div class="invalid-feedback">
                        Field is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="customerLastName" class="form-label">Last Name<i class="text-danger">*</i></label>
                    <input type="text" class="form-control" id="customerLastName" name="customerLastName" required>
                    <div class="invalid-feedback">
                        Field is required
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="customerContact" class="form-label">Contact<i class="text-danger">*</i></label>
                    <input type="text" class="form-control" id="customerContact" name="customerContact" required>
                    <div class="invalid-feedback">
                        Field is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="customerPostalCode" class="form-label">Postal Code<i class="text-danger">*</i></label>
                    <input type="text" class="form-control" id="customerPostalCode" name="customerPostalCode" required>
                    <div class="invalid-feedback">
                        Field is required
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="customerAddress" class="form-label">Address<i class="text-danger">*</i></label>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2 mb-3">
                    <input type="text" class="form-control" id="customerAdd1" name="customerAdd1" placeholder="No" required>
                    <div class="invalid-feedback">
                        Field is required
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <input type="text" class="form-control" id="customerAdd2" name="customerAdd2" placeholder="street" required>
                    <div class="invalid-feedback">
                        Field is required
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="text" class="form-control" id="customerAdd3" name="customerAdd3" placeholder="city" required>
                    <div class="invalid-feedback">
                        Field is required
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="float-end d-inline-flex">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button id="customerFormSubmit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
require_once '../pages/footer.php';
require_once '../pages/scriptInclude.php';
?>
<?php
require_once '../pages/header.php';
if(isset($_SESSION['customer'])){
?>
<section style="min-height: 100vh;">
    <div class="card-body" style="margin-top:100px;">
        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- <ul class="nav nav-tabs nav-fill justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" data-bs-toggle="tab" href="#pills-home">Order History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#pills-profile">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#pills-contact">F & Q</a>
                    </li>
                </ul> -->
                <!-- Order History -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php
                                    include_once '../handler/orderHistoryHandler.php';
                                    $getOrderDetailsMadeById = getOrderDetailsMadeById($_SESSION['customer']['customer_id']);
                                    ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Invoice Id</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Order Status</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($orderDetails = $getOrderDetailsMadeById->fetch_assoc()) { ?>
                                                <tr>
                                                    <td scope="col"><?php echo $orderDetails['invoice_id'] ?></td>
                                                    <td scope="col"><?php echo $orderDetails['invoice_date'] ?></td>
                                                    <td scope="col">
                                                        <?php
                                                        if ($orderDetails['ordertb_status'] == 1) {
                                                            ?> New Order<?php
                                                        }
                                                        if ($orderDetails['ordertb_status'] == 2) {
                                                            ?> Order Pending<?php
                                                        }
                                                        if ($orderDetails['ordertb_status'] == 3) {
                                                            ?> Order Delivered<?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td scope="col"><button class="btn-dark" data-bs-toggle="modal" data-bs-target="#moreDetails" onclick="moreDetails(<?php echo $orderDetails['invoice_id'] ?>)"><i class="fas fa-info-circle"></i></button></td>
                                                </tr>
                                            <?php }; ?>
                                        </tbody>
                                    </table>
                                </div>`
                            </div>
                        </div>
                        <div class="modal" tabindex="-1" id="moreDetails">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Order Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container" id="orderDetailBody"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feedback -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Q & A -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once '../pages/scriptInclude.php';
require_once '../pages/footer.php';
}else{
header('location:index.php');
}

<div class="container-fluid"  >
    <div class="row" id="footer-content">
        <div class="col p-5">
            <h5>COMPANY</h5>
            <ul class="list-unstyled">
                <li>About us</li>
                <li>Our Services</li>
                <li>Blog</li>
            </ul>
        </div>
        <div class="col p-5">
            <h5>CONTACT</h5>
            <p><i class="fad fa-envelope-open-text"></i> email: mrpaan@gmail.com<br>
            <i class="far fa-phone-alt "></i> phone: 076 384 6094</p>
            <i class="fab fa-facebook fa-2x p-1"></i>
            <i class="fab fa-instagram fa-2x p-1"></i>
            <i class="fab fa-pinterest fa-2x p-1"></i>

        </div>
        <div class="col p-5">
            <h5>ADDRESS</h5>
            <address>
                MR. PAAN<br>
                Sirigiri<br>
                Walheengoda<br>
                Ahangama<br>
            </address>
        </div>
    </div>
</div>
<?php
require_once '../pages/scriptInclude.php';
//display a success or error message using toastr that come from session
if (isset($_SESSION['notify'])) {
    // [[][]]
if ($_SESSION['notify']["type"]=="Success") {
?>
<script>
    toastr.success("<?php echo $_SESSION['notify']["msg"] ?>");
</script>
<?php
 unset($_SESSION['notify']);
}else{
    ?>
<script>
    toastr.error("<?php echo $_SESSION['notify']["msg"] ?>");
</script>
<?php
 unset($_SESSION['notify']);
}
}

?>

</body>
</html>

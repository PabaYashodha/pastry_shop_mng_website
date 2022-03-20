$(document).ready(function () {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
})
let addToCart = (Id)=>{
    $.post("../pages/sessionAction.php?addToCart",{foodItemId : Id},function(params) {
        if (params==1) {
            toastr.success("Item count increased");
        }
        if (params==2) {
            toastr.success("Item added");
            $itemCount = +$('#foodItemCountInCart').text() ;
            $itemCount =$itemCount+1;
            $('#foodItemCountInCart').html($itemCount).show;
            console.log($itemCount)
        }
        if (params==3) {
            toastr.success("Item added to the cart");
            $('#foodItemCountInCart').html(1).show;
        }
    },'json')
}
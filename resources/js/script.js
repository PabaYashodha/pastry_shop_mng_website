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
    $.post("../pages/sessionAction.php",{foodItemId : Id},function(params) {
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

//increase item quantity
   let increase = (x) => {
    let quantity = +$('#quantity_'+x).val();
    let unitPrice = parseFloat($('#unit_price_'+x).text());
    let total = parseFloat($('#total').text());
    let increasedQuantity =  quantity+1;
    $('#quantity_'+x).val(increasedQuantity);
    let subTotal = increasedQuantity * unitPrice;
    $('#subTotal_'+x).text(subTotal.toFixed(2));
     total = total + unitPrice;
   $('#total').text(total.toFixed(2));
};

//decrease item quantity
let decrease = (x)=>{
    let quantityVal = +$('#quantity_'+x).val();
    let unitPrice =parseFloat($('#unit_price_'+x).text());
    let total = parseFloat($('#total').text());
    let decreaseQuantity = quantityVal-1;
    if (decreaseQuantity<1) {
        return false;
    }else{
        $('#quantity_'+x).val(decreaseQuantity);
        let subTotal = decreaseQuantity * unitPrice;
        $('#subTotal_'+x).text(subTotal.toFixed(2));
        total = total- unitPrice;
        $('#total').text(total.toFixed(2));
    }
}

let logout = ()=>{
    
}

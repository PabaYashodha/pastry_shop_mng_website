// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })

  let emailValidate=()=>{
      let emailPattern= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
      let customerEmail = $('#customerEmail').val();
      if (!customerEmail.match(emailPattern)) {
        toastr.error("Please enter valid email");
      }else{
          return true;
      }
  }
  let passwordValidate=()=>{
      let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/;
      let newPassword = $('#newPassword').val();
     
      if (!newPassword.match(passwordPattern)) {
          toastr.error("At least 8 Characters required and one Uppercase, one lowercase letter, one number, must be include");
      }else{
          return true;
      }
  }
  let passwordMatching =()=>{
    let newPassword = $('#newPassword').val();
    let confirmPassword =$('#confirmPassword').val();
    if (newPassword != confirmPassword) {
        toastr.error("Passwords aren't matching");
    }else{
        return true;
    }
  }
  $(document).ready(function() {
      const cardHoldersName = $('#cardHoldersName');
      const cardNumber = $('#cardNumber');
      const nameOnCard =$('#nameOnCard');
      const cvc = $('#cvc');
      const expireDate = $('#expireDate');

      $("#paymentForm").click(()=>{
          //console.log('wert');
          let cardHoldersNameVal = cardHoldersName.val();
          let cardNumberVal = cardNumber.val();
          let nameOnCardVal = nameOnCard.val();
          let cvcVal = cvc.val();
          let expireDateVal =expireDate.val();

          if (cardHoldersNameVal=="" && cardNumberVal=="" && nameOnCardVal==""&& cvcVal==""&& expireDateVal=="") {
              toastr.error("fill the card details");
              $([cardHoldersName,cardNumber,nameOnCard,cvc,expireDate]).each(function() {
                  $(this).removeClass("is-valid").addClass("is-invalid");
              })
              cardHoldersName.focus();
              return false;
          }
          if (cardHoldersNameVal=="") {
             addInvalidClass(cardHoldersName,"Please enter card holder's name");
             return false; 
          }
          if (cardNumberVal=="") {
              addInvalidClass(cardNumber,"Please enter card number");
              return false;
          }
          if (nameOnCardVal=="") {
              addInvalidClass(nameOnCard,"Please enter name on card");
              return false;
          }
          if (cvcVal=="") {
              addInvalidClass(cvc,"Please enter cvc number on card");
              return false;
          }
          if (expireDateVal=="") {
              addInvalidClass(expireDate,"Please enter expire date on card");
              return false;
          }
          
          swal({
            title: "Good Job!",
            text: "Payment successful",
            icon: "success",
            buttons: false,
            timer: 1000,
          });

        setTimeout(() => {
            window.location = '../pages/sessionRemove.php';
            }, 1000);
          


      })
    
      let addInvalidClass = (Id, message) => {
        let id = Id
        toastr.error(message);
        id.removeClass("is-valid").addClass("is-invalid").focus();
    }

    let removeInvalidClass = (Id) => {
        let id = Id
        id.removeClass("is-invalid").addClass("is-valid");
    }

    cardHoldersName.change(()=>{removeInvalidClass(cardHoldersName)});
    cardNumber.change(()=>{removeInvalidClass(cardNumber)});
    nameOnCard.change(()=>{removeInvalidClass(nameOnCard)});
    cvc.change(()=>{removeInvalidClass(cvc)});
    expireDate.change(()=>{removeInvalidClass(expireDate)});
  })
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
  })()

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
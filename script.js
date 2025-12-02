$(document).ready(function(){
  $("#registerForm").submit(function(e){
    var phone = $("input[name='phone']").val();
    if(!/^[0-9]{10}$/.test(phone)){
      alert("Please enter a valid 10-digit phone number!");
      e.preventDefault();
    }
  });
});

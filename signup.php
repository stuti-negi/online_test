
<?php require "header.php"; ?>
<div class="container-fluid row justify-content-center mt-5 overflow-hidden">
<form class="border col-6 shadow-lg m-3 mt-4 rounded-lg ">
<h2 class="mt-3 text-center">SIGN UP</h2>
<hr>
<!-- .........................................for Name.................... -->
<div class="form-group m-3 mt-4">
    <label for="name">Name:</label>
    <input type="name" class="form-control" placeholder="Enter name" id="name">
  </div>
  <!-- .........................................for email.................... -->
  <div class="form-group m-3 mt-3 justify-content-center" id="confirm_email1">
 
    <label class="mt-3" for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  
 
   
   <!-- .........................................for Mobile number.................... -->
   <div class="form-group m-3 mt-3 justify-content-center" id="confirm_number1" >

    <label for="number">Mobile number:</label>
    <input type="number" class="form-control" placeholder="Enter mobile number" id="number">
  
    </div>
  
   <!-- .........................................for password.................... -->
  <div class="form-group m-3">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd">
  </div>
 <!-- .........................................for register button.................... -->
<div class="text-center">
  <button type="button" class="btn btn-success m-3 mt-1" id='signup'>Submit</button>
</div>
</form>
</div>
<script>
$(document).ready(function(){

// // .............................submit the form..........................
$("#signup").click(function(){
    var name=$("#name").val();
var email=$("#email").val();

var number=$("#number").val();
var password=$("#pwd").val();


$.ajax({
    url:"helper.php",
    type:"POST",
    data:{
      case:"signin",
        name:name,
       email:email,
        number:number,
        password:password,
    },
    success: function(data){
      alert(data);
      if(data=="1")
      {
        window.location.replace("login.php");
        alert("Signed up sucessfully");
      }
      else{
        alert("Sign up failed");
        window.location.replace("user_register.php");}
    }
    
                });//ajax close

});//btn click close

});//ready close
</script>
<?php //require "footer.php"; ?>
</body>
</html>
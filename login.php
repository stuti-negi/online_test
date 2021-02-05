
<?php require "header.php"; ?>
<div class="row justify-content-center mt-5">
<form class="border col-6 shadow-lg m-3 rounded-lg" >
<h2 class="mt-3 text-center">LOGIN</h2>
<hr>
  <div class="form-group m-3 mt-4">
    <label for="email">USERNAME:</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group m-3">
    <label for="pwd">Password:</label>
    <input type="password" name="pswd" class="form-control" placeholder="Enter password" id="pwd">
  </div>


  <button type="button" class="btn btn-success m-3 mt-1" id="submit">Submit</button>

</form>
</div>
<script>
$(document).ready(function(){
  $("#submit").click(function(e){
    var email_check=$("#email").val();
    var paswd_check=$("#pwd").val();
    if(email_check==""||paswd_check=="")
    {
      alert("enter details to login");
      e.preventDefault();
    }
    else
   { 
     $.ajax({
      url: "helper.php",
      method: "POST",
      data :{ 
        case:"login",
        name:email_check,
        pswd:paswd_check},
        success : function(data)
        {
          // alert(data);
          if(data==1)
          {
           window.location.replace("admin/admindashboard.php");
          alert("Logged in sucessfully!");
          }else if(data == 2)
          {
            window.location.replace("user/userdashboard.php");
          alert("Logged in sucessfully!"); 
          }
          else if(data == 0)
          {
            alert("Login not sucessfull! Please check the username and password entered");
            }
          else{
            window.location.replace("signup.php");
            alert("Email not registered please signup first to login!");
          }
        }
    });}
  });
});
</script>
<?php require "footer.php";?>
</body>
</html>

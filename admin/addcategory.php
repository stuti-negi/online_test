<?php include "header.php"; ?>
<div class="justify-content-center mt-5"> 
</div>
<div class="row justify-content-center mt-5" id="catdiv"> 
<form class="col-6 border shadow-lg m-5 rounded-lg ">


<!-- .........................................for Name.................... -->

<div class="form-group m-3 mt-4">
    <label for="name">CATEGORY<span class="text-danger">*</span>:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="cat">
  </div>
    <!-- .........................................for answer.................. -->

<div class="form-group m-3 mt-1 justify-content-center" >
<button type="submit" class="btn btn-success m-3 mt-1" id='addcategory'>ADD CATEGORY</button>
</div> 

</form>


<!-- <button type="button" class="btn btn-success m-3 mt-1" id='addcategory'>ADD CATEGORY</button> -->
</div> 
<?php require "../footer.php";?>
<script>
$(document).ready(function(){
  // var category=prompt("enter category");
  // alert(category);

  // $('#myModal').modal('show');
  var category='';
  $('#addcategory').click(function(ev){
    category=$("#cat").val();
    if(category=="")
    {
      alert("Please enter the category!");
      ev.preventDefault();
    }
    else
   {  
      $.ajax({
    url:"../helper.php",
    type:"POST",
    data:{
      case:"addcategory",
      category:category,
    },
    success: function(data){
      if(data=="1")
      {
       
        alert("Category created sucessfully!");
        // $('#catdiv').hide();
        // alert("please add the question for the test!");
        // addquestions();
      }
      else{
        alert("Category not created!");
        }
    }
    
                });
              }
    
  });

});

</script>
<?php //require "footer.php";?>
</body>
</html>  
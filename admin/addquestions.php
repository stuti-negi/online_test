
<?php include "header.php"; ?>
<div class="justify-content-center mt-5"> 
</div>

        
      <div class="container-fluid row justify-content-center my-5 overflow-hidden bg-light ">
<form class="col-6 border shadow-lg m-3 mt-5 rounded-lg ">
<h2 class="mt-3 text-center">ADD QUESTION</h2>
<hr>
<!-- .........................................for Name.................... -->
<div class="form-group col-lg-6">
                    <label for="category">Select Product Category
                    <span class="important-field"> *</span></label>
                    <select id="category" class="form-control" 
                    name="questioncategory">
                        <option value="Please select">Please select</option>
                        <?php
											include '../database/testdetails.php';
											$product=new testdetails();
											$data=$product->getcategory();
											$no_r=$data->num_rows;
											for($i=0;$i<$no_r;$i++)
											{
                        $row=$data->fetch_assoc();
                        echo '<option class="text-dark" value="'.$row['id'].'">'.$row['name'].'</option>';
                      }
									?>
					
                    </select>
                    </div>
<div class="form-group m-3 mt-4">
    <label for="name">QUESTION<span class="text-danger">*</span>:</label>
    <input type="text" class="form-control" placeholder="Enter QUESTION" id="question">
  </div>
 
  <!-- .........................................for email.................... -->
  <div class="form-group m-3 mt-1 justify-content-center" >
 
    <label class="mt-3" for="email">OPTION 1<span class="text-danger">*</span>:</label>
    <input type="text" class="form-control" placeholder="Enter OPTION 1" id="optn1">
  </div>
   <!-- .........................................for option 2.................... -->
   <div class="form-group m-3 mt-1 justify-content-center" >
 
    <label class="mt-3" for="email">OPTION 2<span class="text-danger">*</span>:</label>
    <input type="text" class="form-control" placeholder="Enter OPTION 2" id="optn2">
  </div>
     <!-- .........................................for option 3.................... -->
     <div class="form-group m-3 mt-1 justify-content-center">
 
 <label class="mt-3" for="email">OPTION 3<span class="text-danger">*</span>:</label>
 <input type="text" class="form-control" placeholder="Enter OPTION 3" id="optn3">
</div> 
  <!-- .........................................for option 4.................... -->
   <div class="form-group m-3 mt-1 justify-content-center" >
 
    <label class="mt-3" for="email">OPTION 4<span class="text-danger">*</span>:</label>
    <input type="text" class="form-control" placeholder="Enter OPTION 4" id="optn4">
    
  </div>
     <!-- .........................................for answer.................. -->
     <div class="form-group m-3 mt-1 justify-content-center" >
 
    <label for="answer">ANSWER <span class="text-danger">*</span>:</label>
    <select class="form-control" id="answer">
    <option value="">answer</option>
      <option value="option1">OPTION 1</option>
      <option value="option2">OPTION 2</option>
      <option value="option3">OPTION 3</option>
      <option value="option4">OPTION 4</option>
      </select>
  </div>

 <!-- .........................................for register button.................... -->
<div class="text-center">
  <button type="submit" class="btn btn-success m-3 mt-1" id='addquestion'>Submit</button>

</div>
</form>



      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-success" id='addquestion'>Save changes</button> -->
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      <!-- </div> -->
    </div>
  </div>
</div>
<?php require "../footer.php";?>
<script>
$(document).ready(function(){
  $('#addquestion').click( function(e){
    var category=$('#category').val();
    var ques=$('#question').val();
    var ans=$('#answer').val();
    var o1=$('#optn1').val();
    var o2=$('#optn2').val();
    var o3=$('#optn3').val();
    var o4=$('#optn4').val();
    if(category==""||ques==""||ans==""||o1==""||o2==""||o3==""||o4=="")
    {
      e.preventDefault();
      alert("please enter all the details");
    }else{
    //   console.log(category);
    // console.log(ques);
    // console.log(ans);
    // console.log(o1);
    // console.log(o2);
    // console.log(o3);
    // console.log(o4);
    $.ajax({
            url :'../helper.php',
            method : 'POST',
            data:{
              case:'addques',
              questioncategory : category,
              question : ques,
              answer : ans,
              option1 : o1,
              option2 : o2,
              option3 : o3,
              option4 : o4,         
            },
            success:function(data)
            {
              if(data=='1')
              {
                alert('questions added successfully');
              }else
              {
                alert('Error !');
              }
            },
          });
  }
});

});



</script>
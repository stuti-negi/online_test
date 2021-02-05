<?php 

include "header.php";
$_SESSION['testcategory']=$_REQUEST['id'];
// $cat=$_SESSION['testcategory'];
// echo "<script>alert($cat);</script>";
 ?>
 

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #ece8e8;
}

#regForm {
  background-color: white;
  margin: 100px auto;
  font-family: Raleway;
padding-left:15vw;
padding-right:15vw;
  width: 50%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}



/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<div class="text-center mt-5">
  <!-- <h1 class="pt-1" >WELCOME <? echo $_SESSION['user']['name'];?>!</h1>
  </div> -->
  <h1 class="pt-4 text-warning" ><? echo $_REQUEST['name']?> TEST<span class="float-right mr-5" id="showTimer" style="display:none;">Time left : <buttton class="btn btn-success" id="timer">00.00</buttton></span></h1>
  </div>
 
<!-- questions -->
<div id="startBtn" class="text-center text-info m-5 p-5"><h4>Timer will start as soon as you click the start button!</h4><buttton  class="btn btn-success mt-5 p-3" onclick="countdown(5)"><strong>START TEST</strong> </buttton></div>
<div id='formContainer' style="display:none;">
<form id="regForm" class="p-2" action="cal_result.php?">
<div class='bg-warning text-center'><? echo $_REQUEST['name']?></div>
  <!-- <h1><? echo $_REQUEST['name']?> TEST</h1> -->
  <!-- One "tab" for each step in the form: -->
  <?
       include '../database/testdetails.php';
       $product=new testdetails();
       $parentcat_id=$_REQUEST['id'];
       $data=$product->getquestions($parentcat_id);
       if($data=="1"){
        echo "<script>alert('Quiz is unavailable ! Please try again later !');</script>";
         echo "<script>window.location.href='testcategory.php';</script>";
         
       }
       else{
       $no_r=$data->num_rows;
       
  for($i=0;$i<$no_r;$i++)
  {
    $row=$data->fetch_assoc();
  echo '<div class="tab" id="'.$row['id'].'">Q.No.'.($i+1).'<p class="pl-4 mb-0"> '.$row['question'].'
    </p><div class="form-check pl-5">
  <input class="form-check-input" type="radio" name="'.$row['id'].'" id="'.$row['id'].'" value="option1">
  <label class="form-check-label" for="exampleRadios1">
    '.$row['option1'].'
  </label>
</div>
     <div class="form-check pl-5">
  <input class="form-check-input" type="radio" name="'.$row['id'].'" id="'.$row['id'].'" value="option2">
  <label class="form-check-label" for="exampleRadios1">
    '.$row['option2'].'
  </label>
</div>
  <div class="form-check pl-5">
  <input class="form-check-input" type="radio" name="'.$row['id'].'" id="'.$row['id'].'" value="option3">
  <label class="form-check-label" for="exampleRadios1">
    '.$row['option3'].'
  </label>
</div>
  
  <div class="form-check pl-5 ">
  <input class="form-check-input" type="radio" name="'.$row['id'].'" id="'.$row['id'].'" value="option4">
  <label class="form-check-label" for="exampleRadios1">
    '.$row['option4'].'
  </label>
</div>
<div class="form-check pl-5" style="display:none">
<input class="form-check-input" type="radio" name="'.$row['id'].'" id="'.$row['id'].'" value="0" checked>
<label class="form-check-label" for="exampleRadios1">
  '.$row['option4'].'
</label>
</div>
  </div>';
  }
}
?>
 <!-- <p><input placeholder="First name..." oninput="this.className = """ name="fname"></p>
    <p><input placeholder="Last name..." oninput="this.className = """ name="lname"></p> -->
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" class="btn btn-dark" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
  <?php
  for($i=0;$i<$no_r;$i++)
  {
echo '<span class="step"></span>';
  }
  
  ?>
    

  </div>
</form>
</div>
<?php require "../footer.php";?>
<script>
  
var currentTab = 0; // Current tab is set to be the first tab (0)
console.log(document.getElementById("nextBtn").innerHTML);

showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    // document.getElementById("nextBtn").setAttribute("data-id", "submit");
    console.log(document.getElementById("nextBtn").innerHTML);
    
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with valibuttdation of the form fields
  var x, y, i, valid = true;
   var ans;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");//$("input[type='radio'].radioBtnClass:checked").val()
//   y = x[currentTab].$("input[type='radio'].radioBtnClass:checked").val();
//   console.log(y);
  // A loop that checks every input field in the current tab:
  console.log(x[currentTab].id);
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    
    if (y[i].checked == true) {
        ans=y[i].value;
    }
    }
    if(ans== undefined)
    {
        ans='0';
    }
    console.log(ans);
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
// ............................. timer code............................
var timeoutHandle;
function countdown(minutes) {
  document.getElementById("showTimer").style.display = "block";
  document.getElementById("formContainer").style.display = "block";
  document.getElementById("startBtn").style.display = "none";
    var seconds = 60;
    var mins = minutes
    function tick() {
        var counter = document.getElementById("timer");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML =
        current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            timeoutHandle=setTimeout(tick, 1000);
        } else {
 
            if(mins > 1){
 
               // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
               setTimeout(function () { countdown(mins - 1); }, 1000);
 
            }
            else
              {
                document.getElementById("regForm").submit();
// countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
alert("Test submitted sucessfully!");
            
}
        }
        
    }
    tick();
}
 
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82||(e.which || e.keyCode) == 123) e.preventDefault(); };

$(document).ready(function(){
$(document).on("keydown", disableF5);
});
</script>

</body>
</html>


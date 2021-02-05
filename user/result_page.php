<?php include "header.php"; ?>
<div class="mt-5 pl-5">
  <!-- <h3 class="pt-1" >WELCOME <? echo $_SESSION['user']['name'];?>!</h1>
  </div> -->
 
  <?php
  $correct_answers=$_GET['correct_answers'];
  $wrong_answers=$_GET['wrong_answers'];
  $Scores=$_GET['Scores'];
  $unanswered=$_GET['unanswered'];
  $total_ques=$_GET['total_ques'];
  $negativemarks=$_GET['negativemarks'];
?>
    <h3 class="pt-5 text-warning" >SCORES OBTAINED : <?echo $Scores;?></h3>
    <h3 class="pt-1 text-success" >TOTAL QUESTIONS  : <?echo $total_ques;?></h3>
    <h3 class="pt-1 text-success" >Correct ANSWERS : <?echo $correct_answers;?></h3>
    <h3 class="pt-1 text-info" >TOTAL UNANSWERED QUESTIONS : <?echo $unanswered;?></h3>
    <h3 class="pt-1 text-danger" >WRONG ANSWERS : <?echo $wrong_answers;?></h3>
    <h3 class="pt-1 text-danger" >MARKS LOST IN NEGATIVE MARKIING : <?echo $negativemarks;?></h3>
   
    

  </div>
  <div class="row p-5 justify-content-center">
 <button type="button" id="retest" class="btn btn-success">Take Re-test</button>
   </div> 
   <?php require "../footer.php"; ?>
   <script>
   $('#retest').click(function(){
     window.location.replace("testcategory.php");
   });</script>
</html>

<?php include "header.php"; ?>
<div class="mt-5 pl-5">
  <!-- <h3 class="pt-1" >WELCOME <? echo $_SESSION['user']['name'];?>!</h1>
  </div> -->
 
  <?php
$score=0;
$totalques=0;
$unanswered=0;
$wronganswer=0;
$negativemarks=0;
$correctanswer=0;
$cat=$_SESSION['testcategory'];
$userid=$_SESSION['user']['id'];
if(isset($_REQUEST))
{ 
    // echo '<pre>';
    // print_r( $_REQUEST);
    include '../database/testdetails.php';
    $product=new testdetails();
    foreach($_REQUEST as $k => $v)
    {
        // echo $k." - ";
        // echo $v."-";
        $totalques=$totalques+1;
       $id=$k;
       $data=$product->matchanswer($id);
    //    echo $data."<br>";
       if($data==$v)
       {
           $score=$score+3;
           $correctanswer=$correctanswer+1;
       }else{
        
        
        if($v=='0')
        {
            $unanswered=$unanswered+1;
        }else{
            $negativemarks+=0.5;
            $score=$score-0.5;
            $wronganswer=$wronganswer+1;
        }
       }
    }   
   
    echo "<script> 
    var category=$cat;
    var userid=$userid;
    var correct_answers=$correctanswer;
    var wrong_answers=$wronganswer;
    var Scores= $score;
    var unanswered=$unanswered;
    var total_ques=$totalques;
    var negative=$negativemarks;
    </script>";
     }?>

   <script> 
   
    $.ajax({
        url:"../helper.php",
        method:"POST",
        data:{
            case:'insert_testdetails',
            category:category,
            userid:userid,
            correct_answers:correct_answers,
            wrong_answers:wrong_answers,
            Scores:Scores,
            unanswered:unanswered,            
        },
        success: function(data)
         { 
            //  alert(data);
            if(data==1)
             {
                 myurl=`result_page.php?correct_answers=${correct_answers}&wrong_answers=${wrong_answers}&Scores=${Scores}&unanswered=${unanswered}&total_ques=${total_ques}&negativemarks=${negative}`;
                window.location.replace(myurl);
                
        }
        }
    });

    </script>
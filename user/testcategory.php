<?php include "header.php"; ?>
<div class="text-center mt-5">
  <!-- <h1 class="pt-1" >WELCOME <? echo $_SESSION['user']['name'];?>!</h1>
  </div> -->
  <h1 class="pt-5 text-warning" >SELECT SUBJECT</h1>
  </div>
  <div class="row container-fluid p-5">
  <?php
     include '../database/testdetails.php'; 
     $product=new testdetails();
     $data=$product->getquestioncategory();
     $no_r=$data->num_rows;
for($i=0;$i<$no_r;$i++)
{
     $row=$data->fetch_assoc();
 echo '<div class="col-4 mt-3">
 <div class="card text-center bg-success">
 <div class="card-body text-white" id="'.$row['id'].'">
 <h2>'.$row['name'].'</h2>
  <a href="testpage.php?id='.$row['id'].'&name='.$row['name'].'" class="btn btn-outline-warning">TAKE TEST NOW</a>
 </div>
</div>
</div>';
  }
// $select_query="SELECT `tbl_category`.* FROM `tbl_category` JOIN `tbl_questions` ON `tbl_category`.id= `tbl_questions`.parent_id GROUP BY `tbl_category`.name";
  
  ?>
   </div> 
   <?php require "../footer.php"; ?>
</html>
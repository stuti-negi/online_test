<?php include "header.php"; ?>
<div class="justify-content-center mt-5">
  <h1 class="pt-1" > </h1>
  </div>
  
<?php 

// $select_query="SELECT 'status' FROM `tbl_ride`";
// $resultall=mysqli_query($connect,$select_query) or die("SQL Query Failed.");
// $rowcountallrides=mysqli_num_rows($resultall);
// // ................pending rides query...............
// $select_cancelled_query="SELECT 'status' FROM `tbl_ride` WHERE  `status`='0'";
// $resultcancelled=mysqli_query($connect,$select_cancelled_query) or die("SQL Query Failed.");
// $rowcountcancelled=mysqli_num_rows($resultcancelled);
// // ................pending rides query...............
// $select_pending_query="SELECT 'status' FROM `tbl_ride` WHERE  `status`='1'";
// $resultpending=mysqli_query($connect,$select_pending_query) or die("SQL Query Failed.");
// $rowcountpending=mysqli_num_rows($resultpending);
// // ................completed rides query...............
// $select_completed_query="SELECT 'status' FROM `tbl_ride` WHERE `status`='2'";
// $resultcompleted=mysqli_query($connect,$select_completed_query) or die("SQL Query Failed.");
// $rowcountcompleted=mysqli_num_rows($resultcompleted);

// // ................Total earning query...............
// $earning_query="SELECT SUM(total_fare) as fare FROM `tbl_ride` WHERE `status` = '2'";
// $totalearning=mysqli_query($connect,$earning_query) or die("SQL Query Failed.");
// $row= mysqli_fetch_assoc($totalearning);
// // ................Total user query...............
// $user_query="SELECT * FROM `tbl_user` WHERE `isadmin` = '0'";
// $alluser=mysqli_query($connect,$user_query) or die("SQL Query Failed.");
// $rowalluser= mysqli_num_rows($alluser);
// // ................Total active user query...............
// $activeuser_query="SELECT * FROM `tbl_user` WHERE `status`='1' AND `isadmin` = '0'";
// $activeuser=mysqli_query($connect,$activeuser_query) or die("SQL Query Failed.");
// $rowactiveuser= mysqli_num_rows($activeuser);
// // ................Total blocked user query...............
// $blockeduser_query="SELECT * FROM `tbl_user` WHERE `status`='0' AND `isadmin` = '0'";
// $blockeduser=mysqli_query($connect,$blockeduser_query) or die("SQL Query Failed.");
// $rowblockeduser= mysqli_num_rows($blockeduser);
// // ................. Location available.................

// $location_query="SELECT * FROM `tbl_location` WHERE is_available != '0'";
// $location=mysqli_query($connect,$location_query) or die("SQL Query Failed.");
// $rowlocation= mysqli_num_rows($location);
?>


<style>
.btn-outline-secondary:hover {
    color: #6c757d;
    background-color: transparent;
    border-color: #6c757d;
}
.btn-outline-secondary:not(:disabled):not(.disabled):active, .show>.btn-outline-secondary.dropdown-toggle {
    /* color: #fff; */
    /* background-color: #6c757d; */
    border-color: #6c757d;
    color: #6c757d;
    background-color: transparent;
}
.dropdown-item:hover {
    
    color: #16181b !important;
    text-decoration: none;
    background-color: #f8f9fa;
}
.dropdown-item{color:white;}
.dropdown-menu {background-color: #343a40;}
</style>
</head>
<body>

<div class="container justify-content-center mt-5 bg-light">
<!-- <h1 id="adminname">hi admin</h1> -->
<h1>
<div class="row mt-3">
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">Subjects</h5>
        <p class="card-text" id="r_rq"><?php //echo $rowcountpending; ?></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-success">
      <div class="card-body">
        <h5 class="card-title">Users</h5>
        <p class="card-text"><?php //echo $rowcountcompleted; ?></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-info ">
      <div class="card-body">
        <h5 class="card-title">Score Details</h5>
        <p class="card-text"><?PHP //echo $rowcountcancelled;?></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-danger">
      <div class="card-body">
        <h5 class="card-title">Add Questions</h5>
        <p class="card-text"><?php //echo $rowcountallrides; ?></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">Add category</h5>
        <p class="card-text"><?PHP //echo $rowblockeduser;?></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div>
  <!-- <div class="col-sm-3 mt-3">
    <div class="card text-center bg-success">
      <div class="card-body">
        <h5 class="card-title">Approved user </h5>
        <p class="card-text"><?PHP //echo $rowactiveuser;?></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div> -->

</div>

</h1>
<!-- initial container end -->
</div>




  <?php require "../footer.php";?>
  </body>
</html>
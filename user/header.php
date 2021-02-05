<?php
session_start();

if (!isset($_SESSION['user']) || ($_SESSION['user']['is_admin'] != 0)) {
	header('location: ../logout.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>WELCOME USER!</title>
    <style>

    </style>
  </head>
  <body class="font_style" oncopy="{return false}" onpaste="{return false}" oncontextmenu="{return false}">
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><b><span style="color:#bfe00ce3;font-size:2rem;">O</span>NLINE <span style="color:#bfe00ce3;font-size:2rem;">T</span>EST</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item mx-2">
        <a class="nav-link" href="userdashboard.php">Home </a>
      </li>
      <!-- <li class="nav-item mx-2">
        <a class="nav-link" href="#">Home </a>
      </li> -->
      <!-- <li class="nav-item mx-2">
        <a class="nav-link" href="testcategory.php">TEST </a>
      </li> -->
      <!-- <li class="nav-item mx-2">
        <a class="nav-link" href="test.php">LOGIN</a>
      </li> -->
      <!-- <li class="nav-item mx-2">
        <a class="nav-link" href="#">LOGIN</a>
        
      </li> -->
      <li class="nav-item mx-3 mt-2 text-white">
        <? echo $_SESSION['user']['name'];?>
      </li>
      <li class="nav-item mx-2">
      <a href="../logout.php"><button type="button" class="btn btn-success p-1 mt-1" id="logout">Logout</button></a>
      </li>
    </ul>
    
  </div>
</nav>
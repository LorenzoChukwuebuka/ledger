<?php 
  require_once('config.php'); 
  session_start(); 
?>

 <!DOCTYPE html>
 <html>
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> WELCOME || ADMIN </title>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.validate.min.js"></script>
</head>
<style>
 img{
   height:600px;
 }
</style>
 
 <body>
   
  <header>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">Patpenic Ventures</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="viewRecords.php">Stock</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Enterrecords.php">Enter Records</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="payments.php">Bills</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><?= $_SESSION['username']?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Log Out</a>
    </li>
  </ul>
</nav>

  </header> 

  <div class="container-fluid" >

  <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../images/shoes.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>welcome</h5>
          <p>Welcome To Patpenic Ventures</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../images/shoes1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Admin</h5>
          <p>Dearest Admin. This is your ledger</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../images/shoes2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Enjoy</h5>
          <p>Enjoy your application.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> 
</div>

  

 </body>
 </html>

 
   
 

 
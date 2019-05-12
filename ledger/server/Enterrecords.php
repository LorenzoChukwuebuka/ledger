
<?php
session_start();
require_once('config.php');
include('processrecords.php');

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

<style>
  html { 
  background: url(../images/unsplash1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

 body{
   background:none;
   font-size:15px;
   }
   </style>
</head>

<body>
<!-- the navbar section -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="admin.php">Patpenic Ventures</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="viewRecords.php">Stock</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Enterrecords.php">Enter Records</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="payments.php"> Bills </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><?= $_SESSION['username']?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Log Out</a>
    </li>
  </ul>
</nav>



 <!-- end of navbar -->

<div class="container">


<header>
    <p> <h3> Please fill in the details here </h1> </p>
     <p> <?php echo $error; ?> </p>
     <p> <?=$success; ?> </p>
</header>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<div class="form-group">
  <label for="sel1">Select company</label>
  <select class="form-control" name="company">
  <option value="-">Select Company</option>
  <?php
				$result = $con->query('SELECT * FROM company'); 
				while($row = $result->fetch_assoc())
				{
					#$options = $options."<option>$row['name']</option>";
					$id = $row['id'];
					$name = $row['name'];
					echo '<option value="'.$id.'">'.$name.'</option>';
				}
			?>
  </select>
</div>

 <div class="form-group">
    <label for="article_number">Article Number</label>
    <input type="text" class="form-control" name="article_number">
  </div>
  <div class="form-group">
    <label for="quantity_carton">Quantity Per Carton</label>
    <input type="number" class="form-control" name="quantity_carton">
  </div>
  <div class="form-group">
    <label for="Total_quantity"> Total quantity of carton purchased for the item:</label>
    <input type="number" class="form-control" name="Total_quantity">
  </div>
  <div class="form-group">
    <label for="Price_per_pair"> Price Per pair</label>
    <input type="number" class="form-control" name="Price_per_pair">
  </div>

  <div class="form-group">
    <label for="date_entered"> Date </label>
    <input type="date" class="form-control" name="date_entered">
  </div>
   
  <button type="submit" class="btn btn-primary" name="register">Submit</button>
  <a href="admin.php" class="btn btn-primary">Cancel</a>
</form>


  </div>

 
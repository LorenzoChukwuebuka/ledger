<?php
session_start();
require_once('config.php');
$error = '';
$success ="";

if(isset($_GET['pay']))
 $id = $_GET['pay'];
 $res = $con->query("SELECT * FROM transactions");
 $row = $res->fetch_array();


 // get the values of the input
 if(isset($_POST['makePay'])){
     //$id= $_POST['id'];
     $amount = $_POST['amount'];
     $datePaid = $_POST['datePaid'];

     
  // validate input data
  if(!$amount){
    $error .='<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
     Amount is required.
  </div>';
 
   }
  if(!$datePaid){
   $error .='<div class="alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
    Date is required.
 </div>';

  }

     if(!empty($amount) && !empty($datePaid)){
     
        $res1 =  "UPDATE transactions SET paymentsmade=$amount, paymentsDate='$datePaid' Where id='$id'";
       $query = $con->query($res1);

       if($query){
           $success = '<div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
            Paid successfully.
         </div>';
       }
     }


 }

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
  html { 
  background: url(../images/26.jpeg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

 body{
   background:none;
   font-size:17px;
   }
   </style>

<body>
<header>

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

<div class="container">

<div class="error"> <?=$error;?> </div>
<div class="success"> <?=$success;?> </div>

<form method="POST">
<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
  <div class="form-group">
    <label for="amount"> Amount Payable</label>
    <input type="number" class="form-control" name="amount"value="enter payments">
  </div>
  <div class="form-group">
    <label for="datepaid">date:</label>
    <input type="date" class="form-control" name="datePaid">
  </div>
 
  <button type="submit" name="makePay" class="btn btn-primary">Make Payment</button>
</form>
</div>
</body>
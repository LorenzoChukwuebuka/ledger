<?php
session_start();
include('config.php');

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
      <a class="nav-link" href="#">Bills</a>
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

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="payments.php">Rong Chen</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="xeron2.php">Xeron</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="VS2.php">VStar</a>
          </li>
            <li class="nav-item">
           <a class="nav-link" href="#" tabindex="-1">Emeka Dogo</a>
          </li>
     </ul>

  
  <table class="table table-striped table-bordered">
  <caption> Payments Records </caption>
  <thead class="thead-dark">
    <tr>
      <th scope="col"> Company Paid to </th>
      <th scope="col"> Payments made </th>
      <th scope="col">Date</th>
      <th scope="col">make payment</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
   $res = "SELECT company.*,item.*,transactions.*, transactions.id AS tid FROM company JOIN item ON company.id = item.companyId
   JOIN transactions ON item.id = transactions.itemId WHERE item.companyId =4";

$result = $con->query($res);


while($row = $result->fetch_assoc())
  {
    $id = $row['tid']; 
    $company = $row['name'];
    $TP = $row['paymentsMade'];
    $DC =$row['paymentsDate'];
 
 ?>
<tr>
     <td><?=$company;?></td>
     <td><?='N'.$TP;?></td>
     <td><?=$DC;?></td>
     <td><a class="btn btn-primary" href="payform.php?pay=<?php echo $row['tid']?>">Payments</td>
  
</tr>

 <?php } ?>
 </tbody>
</table> 
<br>

<?php
$hey="";

$res = $con->query("SELECT sum(bills - paymentsMade) AS rem , company.*,item.*,transactions.* 
FROM company JOIN item ON company.id = item.companyId JOIN transactions ON item.id = transactions.itemId
 WHERE item.companyId=4");
$res1 = $res->fetch_assoc();

$sum1= $res1['rem']; 

$res = $con->query("SELECT sum(paymentsMade) AS diff , company.*,item.*,transactions.* 
FROM company JOIN item ON company.id = item.companyId JOIN transactions ON item.id = transactions.itemId
 WHERE item.companyId=4");
$res2 = $res->fetch_assoc();

$ksum = $res2['diff'];

if ($ksum == 0  || $ksum == null &&  $sum1 == 0  || $sum1 == null){
    $hey = 0;
 }
 

   
?>


<p><h4>Paid <span class="badge badge-primary"> <h5><?='N'.$ksum.''.$hey;?></h5></span></h4>

  <h4> Outstanding <span class="badge badge-primary"><h5><?='N'.$sum1.''.$hey;?></h5></span></h4> </p>


  

   
</div>   
</body>
</html>

 
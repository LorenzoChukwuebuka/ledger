<?php
session_start();
require_once('config.php');

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

  <div class="container-fluid">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="viewRecords.php">Rong Chen</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="xeron.php">Xeron</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="VS.php">VStar</a>
          </li>
            <li class="nav-item">
           <a class="nav-link" href="EmekaDogo.php" tabindex="-1">Emeka Dogo</a>
          </li>
     </ul>

    

     <table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Article Number</th>
      <th scope="col"> Total Quantity Bought</th>
      <th scope="col">Quantity Per Carton</th>
      <th scope="col">Price Per item</th>
      <th scope="col">Price Per Carton</th>
      <th scope="col">Total price for item purchased</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   $res = "SELECT company.*,item.*,transactions.* FROM company JOIN item ON company.id = item.companyId
   JOIN transactions ON item.id = transactions.itemId WHERE item.companyId=3";
   
  
$result = $con->query($res);
while($row = $result->fetch_assoc())
{
    //var_dump($row);
     $AN = $row['ArticleNum'];
     $QN = $row['quantityTotal'];
     $QPC = $row['quantityPerCarton'];
     $PPP = $row['PricePerArt'];
     $PPC = $row['PricePerCart'];
     $TP = $row['bills'];
     $DC =$row['DateCreated'];

     

     ?>

 <tr>
     <td><?=$AN;?></td>
     <td><?=$QN;?></td>
     <td><?=$QPC;?></td>
     <td> <?='N'.$PPP;?></td>
     <td><?='N'.''.$PPC;?></td>
     <td><?='N'.''.$TP;?></td>
     <td><?=$DC;?></td>
   </tr>
 <?php } ?>
 
   
    
 
  </tbody>
</table>

 
 

  
   

    


   



 



  </div>

  
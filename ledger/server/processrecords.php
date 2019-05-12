<?php 
require_once('config.php');

// declare variables
$error = "";
$company="";
$AN="";
$QPC ="";
$TQ ="";
$PPP ="";
$Dd = "";
$success = "";
 
 
// collect input data and verify

if(isset($_POST['register'])){ 
  
  // collect input data
  $company = $_POST['company'];
  $AN= $_POST['article_number'];
  $QPC = $_POST['quantity_carton'];
  $TQ = $_POST['Total_quantity'];
  $PPP = $_POST['Price_per_pair'];
  $Dd = $_POST['date_entered'];

  // total price per carton
  $TPC = $QPC * $PPP;

  // total price of the commodity bought 
  $TPB = $TPC * $TQ;
  

  // validate input data
  if(!$company){
    $error .='<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
     Please select company.
  </div>';
 
   }
  if(!$AN){
   $error .='<div class="alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
    Please enter Article Number.
 </div>';

  }

   if(!$QPC){

    $error .='<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
     Please enter quantity Per Carton.
  </div><br>';

    }

    if(!$TQ){

      $error .='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Please enter Total quantity of the item purchased.
    </div>';
  
      }
 
    if(!$PPP){

      $error .='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Please enter Price Per Pair in the carton.
    </div>';
  
      }
      
    if(!$Dd){

      $error .='<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Date is required for this transaction.
    </div>';
  
      }


   if($error != "")
   {

    $error = '<p> <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Please recheck your form there are errors.
  </div> </p>'.$error;
   }  

     // if form fields are not empty add to database
      //echo $AN.', '.$QPC.', '.$company.', '.$TQ.', '.$Dd;
     if(!empty($AN) && !empty($QPC) && !empty($TQ) && !empty($PPP) && !empty($Dd)){
     
    $res= $con->query("INSERT INTO item (ArticleNum, quantityPerCarton, PricePerArt, PricePerCart, companyId, quantityTotal, DateCreated) VALUES ('$AN', $QPC ,$PPP, $TPC,  $company, $TQ , '$Dd')");
    $lastId = $con->insert_id;
    if($lastId)
    {
     // echo $TPB.', '.$lastId;
     $res2 = $con->query("INSERT INTO transactions (bills, itemId) values ($TPB, $lastId)");
      if($res2){
        $success = "<div class='alert alert-success alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                      Data has been uploaded successfully.
                    </div>";

      } 
    } 

        


        
  
     } // end of if for form not empty
    
      
   
   
  }



?>
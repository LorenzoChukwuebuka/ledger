<?php include('server/config.php');
    session_start();
    
     // declare variables
           $error = '';
           $username ='';
           $password = '';
    
          // check user inputs and validate
       if(isset($_POST['reg'])){
    
         // collect input data
         $username = $_POST['username'];
         $password = $_POST['password'];
         
         if(!$username){
    
             $error .='<div class="alert alert-danger alert-dismissible col-md-6">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
              Please Enter Username.
           </div>';
    
            }
    
           if(!$password){
    
           $error .='<div class="alert alert-danger alert-dismissible col-md-6">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
            Please Enter Password.
         </div>';
    
           }
    
          if($error != "")
          {
    
           $error = '<div class="alert alert-danger alert-dismissible col-md-6">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
            Incorrect username/password.
         </div>'.$error;
          }  
    
    
             // check database for user 
         if(!empty($username) && !empty($password)){
            $res = $con->query("SELECT * FROM user WHERE username ='$username' AND password= '$password'");
            
            /*while($rw = $res->fetch_assoc()){
              echo $rw['count'];
            }*/
            $numRows = $res->num_rows;
            if($numRows > 0){
              $rw = $res->fetch_assoc();              
              $_SESSION['username'] = $rw['username'];

              header('location:server/admin.php');
            } 
        }
    
    
      }
    ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> LOGIN </title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
 
 <style>
  html { 
  background: url(images/back.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

 body{
   background:none;
   }

   
  

 </style> 

</head>

 <body>

    <div class="container">
    <div class="error"> <?=$error ?> </div>
    <br>
    <header> <p> <h3> LOGIN </h3> </p>
     </header>
     <br>
     <br>

 <form method = "POST">
  <div class="form-group col-md-6">
    <label for="username">Username </label>
    <input type="text" class="form-control" name="username"> 
  </div>
  <div class="form-group col-md-6">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
   
   v <button type="submit" name="reg" class="btn btn-primary">Login</button>
</form>

 </div>

 	</body>
 	</html>


 	<script>

    $document.ready(function(){

    })
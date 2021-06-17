<?php
    include "stayclassydb.php";

      session_start();
      if(!isset($_SESSION['loggedin'])){
        if(isset($_REQUEST['login'])){
        $lemail=$_REQUEST['lemail'];
        $lpassword=$_REQUEST['lpassword'];
        $sql="SELECT * from user_master where email='$lemail' AND password='$lpassword'";
        $result=mysqli_query($conn,$sql);
        if($lemail=='' || $lpassword==''){
           $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid orange;padding: 1rem;font-size: 1.5rem;color: black;background-color:orange;margin-top:2rem;margin-bottom: 6rem;'>
  <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> All Fileds Are Required. </div></div></div>";
        }
        else{
        if(mysqli_num_rows($result)==1){
          // echo "login sucessfully";
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $lemail;
          echo "<script>alert('Login Successfull..')</script>";
          echo "<script> location.href='index.php';</script>";
        }
        else{
          $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid orange;padding: 1rem;font-size: 1.5rem;color: black;background-color:orange;margin-top:2rem;margin-bottom: 6rem;'>
  <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Email OR Password Are Invalid. </div></div></div>";
        }
      }
    }
  }
    else{
      echo "<script> location.href='myaccount.php';</script>";
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
    
     <link rel="stylesheet" type="text/css" href="stay.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>www.thestayclassy.com</title>
  </head>
  <body>
     <!-- header start here-------------------------------------->
   <?php
   include "headerlogin.php";
   ?>
   

   

  
   <div class="container mb-3 mt-5" >
      <div class="row" >
        <div class="col-md-6 mb-5 pl-5 mt-5" style="border-right: .2rem solid grey">
          <div id="regist1"><i class="fa fa-sign-in" aria-hidden="true" ></i> Login</div>
          <div class="row">
            <div class="col-10">
          <form action="" method="POST">
  <div class="form-group" id="text1">
    <label for="exampleInputEmail2">Email address*</label>
    <input type="email" class="form-control"  id="exampleInputEmail2 text2" aria-describedby="emailHelp" placeholder="Enter your email address" name="lemail">
    
  </div>
  
  <div class="form-group" id="text1">
    <label for="exampleInputPassword1">Password*</label>
    <input type="password" class="form-control" id="exampleInputPassword1 text2" placeholder="Enter your password" name="lpassword">
  </div>
  
         <span id="forgot"><a href="forgotpage.php">Lost your password ?</a></span>
     
     
  
  <button type="submit" class="btn btn-dark btn-lg btn-block" id="submitbutton" name="login">Submit</button>
  <?php if(isset($regmsg)){echo $regmsg;} ?>
  </form>
</div>
</div>
 </div>



         <div class="col-md-6 mt-5">
          <div id="regist2"><CENTER>REGISTRATION</CENTER></div>
          
          <div id="registdetail"><center>Registering for this site allows you to access your order status and history.just fill in the fields below, and we'll get a new account set up for you in no time.we will only ask you for information necessary to make the purchase process faster and easier.</center>
          </div>
          <center><button type="button" class="btn btn-outline-dark" id="loginbutton"><a href="registration.php" style="text-decoration: none;color: black;">Registration</a></button></center>
        </div>
        
      </div>
     
   </div>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br><br><br><br><br>
 <div style="color: white;font-size: 1.4rem;padding-bottom: 2rem;padding-top: 2rem;background-color: black"><center><i class="fa fa-copyright" aria-hidden='true'></i> 2021 Stay Classy Clothing Company. All Rights Reserverd.</center></div>

   <!-------- footer start here------------------------------------------------>
    <?php
   // include "footer.php";
   ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

    <!-- <link rel="stylesheet" type="text/css" href="boostrap\js\boostrap.min.css"> -->
  </body>
</html>
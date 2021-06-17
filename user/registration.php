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
    <style type="text/css">
      @media (max-width: 500px){
        #regist1{
          font-size: 1.8rem;
        }
      }
    </style>
  </head>
  <body>
     <!-- header start here-------------------------------------->

<?php 
     include "headerlogin.php"; 
     include "stayclassydb.php";

    if(isset($_REQUEST['submit'])){
      if(($_REQUEST['uname'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['password'] == "") || ($_REQUEST['mobile'] == "")){
       $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid orange;background-color:orange;padding: 1rem;font-size: 1.5rem;color: white;margin-top:2rem;margin-bottom: 6rem;'>
  <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> All fields are required. </div></div></div>";
     } 
      else { 
    $sql = "SELECT email FROM user_master WHERE email='".$_REQUEST['email']."'" ;
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)) {
      $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid red;margin-top:2rem;padding: 1rem;font-size: 1.5rem;color: black;background-color:red;margin-bottom: 6rem;'>
  <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Email ID Already Registered. </div></div></div>";
    } 
     else{
       $uname=$_REQUEST['uname'];
       $email=$_REQUEST['email'];
       $password=$_REQUEST['password'];
       $mobile=$_REQUEST['mobile'];
       if(strlen($password)<8){
          $checkpass="Please enter atleast 8 character *";
       }
       else
       {
       $sql="INSERT INTO user_master (u_name,email,password,mobile) VALUES('$uname','$email','$password','$mobile')";
       if(mysqli_query($conn,$sql)){
         echo "<script>alert('Account Registeration Successfullu..')</script>";
          echo "<script> location.href='login.php';</script>";
       }
       else{
         $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid orange;padding: 1rem;font-size: 1.5rem;color: white;background-color:orange;margin-top:2rem;margin-bottom: 6rem;'>
  <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Unable to create Account. </div></div></div>";
       }
      }
    }
  }
}

?>
  
<!-- <div class="container" id="registercontain">
  <div class="row">
    <div col-12 style="border:.2rem solid orange;padding: 1rem;font-size: 1.5rem;color: orange;margin-top: 2rem;margin-bottom: 2rem;">
      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please login or register to complete your purchase.
    </div>
  </div>
</div>
  -->
 <?php if(isset($regmsg)){echo "<div class='container'><div class='row'><div class='col-md-6'>".$regmsg."</div></div></div>";} ?>
    
   <div class="container mb-3 mt-5  " >
      <div class="row" >
        <div class="col-md-6 pl-5 mb-5 mt-5" style="border-right: .2rem solid grey">
          <div id="regist1"> <i class="fa fa-user-o" aria-hidden="true"></i> Registration</div>
          <div class="row">
            <div class="col-10">
          <form action="" method="POST">
  <div class="form-group" id="text1">
    <label for="exampleInputEmail2">Name*</label>
    <input type="text" class="form-control" id="exampleInputEmail2 text2" aria-describedby="emailHelp" placeholder="Enter your name" name="uname" Required>
    
  </div>
  <div class="form-group" id="text1">
    <label for="exampleInputEmail1">Email address*</label>
    <input type="email" class="form-control" id="exampleInputEmail1 text2" aria-describedby="emailHelp" placeholder="Enter your email"  name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" Required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group" id="text1">
    <label for="exampleInputPassword1">Password*</label>
    <input type="password" class="form-control" id="exampleInputPassword1 text2" placeholder="Enter your password" name="password"  Required>
    <?php
     if(isset($checkpass)){
      echo ' <small id="emailHelp" class="form-text" style="color:red;font-size:1.8rem">'.$checkpass.'</small>';
     }
    ?>
  </div>
  <div class="form-group" id="text1">
    <label for="exampleInputEmail4">Mobile No.*</label>
    <input type="text" class="form-control" id="exampleInputEmail4 text2" aria-describedby="emailHelp" placeholder="Enter your mobile number" name="mobile" Required>
    
  </div>
  <button type="submit" class="btn btn-dark btn-lg btn-block" id="submitbutton"  name="submit">Submit</button>
  
  </form>
</div>
</div>
 </div>



         <div class="col-md-6 mt-5">
          <div id="regist2"><CENTER>REGISTRATION</CENTER></div>
          
          <div id="registdetail"><center>Registering for this site allows you to access your order status and history.just fill in the fields below, and we'll get a new account set up for you in no time.we will only ask you for information necessary to make the purchase process faster and easier.</center>
          </div>
          <center><button type="button" class="btn btn-outline-dark" id="loginbutton" ><a href="login.php" style="text-decoration: none;color: black;">Login</a></button></center>
        </div>
        
      </div>
     
   </div>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br><br><br><br><br>

                  </div>
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
  </body>
</html>
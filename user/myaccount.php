<?php 
include "header.php";
include "stayclassydb.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
  echo "<script> location.href='login.php';</script>";
  exit;
}

if(isset($_REQUEST['logout'])){
  session_unset();
  session_destroy();
  echo "<script> location.href='login.php';</script>";
}
if(isset($_SESSION['email'])){
$useremail=$_SESSION['email'];

  $usersql="SELECT * from user_master WHERE email='$useremail'";
   $userresult= mysqli_query($conn,$usersql);
   if(mysqli_num_rows($userresult)>0){
      while($useridrows = mysqli_fetch_assoc($userresult))
       {
      $userid= $useridrows['u_id'];
   }
 }
 else{
  echo "no id";
 }
 }
?>
 


 <!--------------------------------profile php---------------------------------->
 <?php
if(isset($_POST['updateprofile'])) {
  $edit_username=$_POST['edit_username'];
  $edit_mobile=$_POST['edit_mobile'];
  $edit_email=$_POST['edit_email'];
  $updatesql="UPDATE user_master SET u_name='$edit_username',mobile='$edit_mobile' WHERE u_id='$userid'";
  $updateresult=mysqli_query($conn,$updatesql);
  if($updateresult){
    $update='updated successfully';
  }
  else{
     $update='Not updated';
  }
}
?>


<?php
if(isset($_POST['change'])){
  $curruntpass=$_POST['curruntpass'];
  $new_pass=$_POST['new_pass'];
  $confirm_pass=$_POST['confirm_pass'];
  $entercurruntpass=$_POST['entercurruntpass'];
  if($curruntpass==$entercurruntpass){
    if($new_pass==$confirm_pass){
      $changesql="UPDATE user_master SET password='$new_pass' WHERE u_id='$userid'";
      $changeresult=mysqli_query($conn,$changesql);
      if($changeresult){
        $change='password change successfully';
      }
      else
      {
        $change='password not change';
      }
    }
    else{
      $change='password not match';
    }
  }
else{
  $change='password is wrong';
}
}



?>
<!---------------------------------profile php end here--------------------------------------->
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="stay.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>www.thestayclassy.com</title>

    <style type="text/css">
      #myaclogout{
       position:relative;
       font-size: 2rem;
       padding-left: 2rem;
       padding-right: 2rem;
       margin-top: -5.5rem;
       left: 16rem;
      }
      @media (max-width: 440px){
        #myaclogout{
          left:14rem;
        }
      }
    </style>


  </head>
  <body>
   
   

     
   <div id="innerdrop">
    <div id="innerdrop1"><center>MY ACCOUNT</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / My Account</center></div>
   </div>
   

   
     
<div class="container" style="margin-top: 5rem;">
  <div class="row">
    <div class="col-md-8 mt-4">
      <div class="card">
  <div class="card-header" style="background-color: rgb(240, 240, 240);padding: 2rem;font-size: 3rem;">
           <span style="background-color: rgb(195, 232, 134);padding: 1rem;color:white">1.</span>
            MY PROFILE
          </div>
          <div class="card-body">
             <div>
            <div style="margin-top: 2rem;margin-left: 2rem;font-size: 3rem">Personal Info</div>
      <?php

      $sql="SELECT * FROM user_master WHERE u_id='$userid'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        while($rows=mysqli_fetch_assoc($result)){
          $u_name=$rows['u_name'];
          $email=$rows['email'];
          $mobile=$rows['mobile'];
          $id=$rows['u_id'];
          $password=$rows['password'];
        }
      }
      ?>


        <form action="" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
      <div class="form-group col-lg-9 mt-5" style="font-size: 2rem;">
         <label> USERNAME*</label>
         <input type="text" name="edit_username" value="<?php echo $u_name; ?>" class="form-control" placeholder="Enter Username" style="font-size: 2rem;padding: 1.5rem">
       </div>
       <div class="form-group col-lg-9 mt-4" style="font-size: 2rem;padding: 1.5rem">
         <label> EMAIL ADDRESS*</label>
         <input type="text" name="edit_email" value="<?php echo $email; ?>" readonly class="form-control" " placeholder="Enter Email Address" style="font-size: 2rem;padding: 1.5rem" >
       </div>
      
       <div class="form-group col-lg-9 mt-4" style="font-size: 2rem;">
         <label> MOBILE NO.*</label>
         <input type="text" name="edit_mobile" value="<?php echo $mobile; ?>" class="form-control" placeholder="Enter Mobile Number" style="font-size: 2rem;padding: 1.5rem">
       </div>
      
       <div>
        <button type="submit" class="btn btn-success ml-4 mt-5" name="updateprofile" style="font-size: 2rem;padding-left: 2rem;padding-right: 2rem">UPDATE</button>
      </div>
       </form>
       <form action="" method="POST">
      <button class="btn btn-danger ml-4" type="submit" value="logout" id="myaclogout" name="logout" >LOGOUT</button>
       <div >
        <?php
         if(isset($update))
          {
            echo '<div class="form-group col-lg-9 mt-4" style="font-size: 2rem;background-color:lightblue;text-align:center;padding:1rem">
         '.$update.'</div>';
          }
           ?>
            
        </div>
     </form>
      </div>
    </div>
  </div>
 </div>

      
    <div class="col-md-4 mt-4">
     <div class="card">
  <div class="card-header" style="background-color: rgb(240, 240, 240);padding: 2rem;padding-bottom:3rem;font-size: 2.5rem;">
           
            YOUR CHECKOUT PROGRESS
          </div>
  <div class="card-body">
    <a href="myaccount.php" style="text-decoration: none;color: black"><div style="margin-top: 2rem;margin-left: 2rem;font-size: 2rem">My Account</div></a>
     <!-- <a href="myaccount2.php" style="text-decoration: none;color: black"><div style="margin-top: 1.5rem;margin-left: 2rem;font-size: 2rem">Shipping Address</div></a> -->
      <a href="order_history.php" style="text-decoration: none;color: black"><div style="margin-top: 1.5rem;margin-left: 2rem;font-size: 2rem">Order History</div></a>
      
    
 
    </div </div>
</div> 
</div>
<div class="row" style="margin-top: 2rem">
<div class="col-md-8 mt-4">
  <div class="card">
  <div class="card-header" style="background-color: rgb(240, 240, 240);padding: 2rem;font-size: 3rem;">
           <span style="background-color: rgb(195, 232, 134);padding: 1rem;color:white">2.</span>
            CHANGE PASSWORD
          </div>
  <div class="card-body">
   <form action="" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
      <div class="form-group col-lg-9 mt-5" style="font-size: 2rem;">
         <label> CURRUNT PASSWORD*</label>
         <input type="hidden" name="curruntpass" value="<?php echo $password; ?>">
         <input type="password" name="entercurruntpass" value="" class="form-control"  style="font-size: 2rem;padding: 1.5rem" id="password" required>
         <i class="fa fa-eye" aria-hidden="true" style="position: relative;top:-3rem;left: 90%; color:grey" id="eye" onclick="toggle()"></i>
       </div>
       <div class="form-group col-lg-9 mt-4" style="font-size: 2rem;">
         <label> NEW PASSWORD*</label>
         <input type="password" name="new_pass" value="" class="form-control"  style="font-size: 2rem;padding: 1.5rem" id="password1" required>
         <i class="fa fa-eye" aria-hidden="true" style="position: relative;top:-3rem;left: 90% ;color:grey" id="eye1" onclick="toggle1()"></i>
       </div>
      
       <div class="form-group col-lg-9 mt-4" style="font-size: 2rem;">
         <label> CONFIRM PASSWORD*</label>
         <input type="password" name="confirm_pass" value="" class="form-control"  style="font-size: 2rem;padding: 1.5rem" id="password2" required>
         <i class="fa fa-eye" aria-hidden="true" style="position: relative;top:-3rem;left: 90%;color:grey" id="eye2" onclick="toggle2()"></i>
       </div>
      
       <div>
        <button type="submit" class="btn btn-success ml-4 mt-5 mb-5" name="change" style="font-size: 2rem;padding-left: 2rem;padding-right: 2rem">CHANGE</button>
      </div>
      <div>
        <?php 
        if(isset($change))
        {
         echo '<div class="form-group col-lg-9 mt-4" style="font-size: 2rem;background-color:lightblue;text-align:center;padding:1rem">
         '.$change.'</div>';
        } 
       ?></div>
       </form>

  </div>
</div>
</div>
  </div>
  
</div>
<br>

<script type="text/javascript">
  var state=false;
  function toggle(){
    if(state){
    document.getElementById("password").setAttribute("type","password");
    state=false;
  }
  else{
    document.getElementById("password").setAttribute("type","text");
    state=true;
  }
}
function toggle1(){
    if(state){
    document.getElementById("password1").setAttribute("type","password");
    state=false;
  }
  else{
    document.getElementById("password1").setAttribute("type","text");
    state=true;
  }
}
function toggle2(){
    if(state){
    document.getElementById("password2").setAttribute("type","password");
    state=false;
  }
  else{
    document.getElementById("password2").setAttribute("type","text");
    state=true;
  }
}
</script>


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
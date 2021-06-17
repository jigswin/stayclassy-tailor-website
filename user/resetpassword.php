<?php
include "headerlogin.php";
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>www.thestayclassy.com</title>
  </head>
  <body>
    <?php 
    include "stayclassydb.php";

   
    
    if(isset($_REQUEST['savepassword'])){

           
        if(isset($_GET['forgotemail'])){
          $getemail=$_GET['forgotemail'];
         $repassword=$_REQUEST['repassword'];
         $cpassword=$_REQUEST['cpassword'];
         

      if($repassword === $cpassword){
       
        $sql="UPDATE user_master SET password='$cpassword' where email='$getemail'";
        $result=mysqli_query($conn,$sql);

        if($result){
          echo "<script>alert('your password change successfully.please login with new password.')</script>";
          echo "<script> location.href='login.php';</script>";
        }
        else{
        $formsg= "<div class='col-10 mt-4 p-2 bg-success' >Password not updated..</div>";
      }
    }
    else{
      $formsg= "<div class='col-10 mt-4 p-2 bg-success' >Password are not match..</div>";
    }
 }
}

    ?>
    

    <center><div class="container mt-4">
      <div style="font-size: 2.7rem">RESET PASSWORD</div>
      <form action="" method="POST" >
        <div style="border:.1rem solid grey; padding-top:5rem;padding-bottom:5rem;padding-left:2rem;padding-right:2rem;margin-top: 2rem;background-color:rgb(236,240,241)" class="mb-3 col-md-4 ">
  
  <div class="mb-3 col-md-10">
    <label for="password" class="form-label" style="font-size:2rem;">New Password</label>
    <input type="password" class="form-control" id="password" name="repassword" style="height: 3.5rem;font-size: 2rem" Required>
    <i class="fa fa-eye" aria-hidden="true" style="font-size:2rem;position: relative;top:-2.9rem;left: 43%; color:grey" id="eye" onclick="toggle()"></i>
  </div>
   <div class="mb-3 col-md-10">
    <label for="password2" class="form-label" style="font-size:2rem;">Confirm Password</label>
    <input type="password" class="form-control" id="password1" name="cpassword" style="height: 3.5rem;font-size: 2rem" Required>
    <i class="fa fa-eye" aria-hidden="true" style="font-size: 2rem;position: relative;top:-2.9rem;left: 43%; color:grey" id="eye" onclick="toggle1()"></i>
  </div>
  <div class="d-grid gap-2 col-md-10 ">
  
  <button class="btn btn-primary mt-3 pl-3 pr-3" type="submit" name="savepassword" style="font-size: 1.8rem">Save Password</button>
</div>
    <?php 
 if(isset($formsg)){
  echo $formsg;
 }
 ?>  
  </div>
</form>

    </div>




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

</script>  


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
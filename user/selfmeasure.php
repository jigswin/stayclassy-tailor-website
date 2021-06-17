<?php

include "header.php";
include "stayclassydb.php";


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  echo "<script> location.href='login.php';</script>";
  exit;
}
$useremail=$_SESSION['email'];

  $usersql="SELECT * from user_master WHERE email='$useremail'";
   $userresult= mysqli_query($conn,$usersql);
   if(mysqli_num_rows($userresult)>0){
      while($useridrows = mysqli_fetch_assoc($userresult))
       {
      $userid= $useridrows['u_id'];
      $_SESSION['userid']=$userid;
      
   }
 }
 else{
  echo "no id";
 }

if(isset($_REQUEST['logout'])){
  
  
  session_unset();
  session_destroy();
  echo "<script> location.href='login.php';</script>";

}
?>
<style type="text/css">
  .row label{
    font-size: 2rem;
    margin-top: 2rem;
  }
  .row input{
    font-size: 2rem;
    padding: 2rem;
  }
  #checkbtn input{
    margin-top: 2.4rem;
   margin-left: -1.4rem;
   margin-right: 1rem;
  }
  #shirtpad{
    padding: 4rem;
  }
</style>

<div id="innerdrop">
    <div id="innerdrop1"><center>SELF MEASUREMENT</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Self Measurement</center></div>
   </div>
   
    
    <!-- <a href="deliveryaddress.php">ADDRESS</a><br> -->

<!----------------------shirt------------------------------------------------------------------>

    <div style="text-align: center;font-size: 3rem;text-decoration: underline;margin-top: 4rem;margin-bottom:4rem;">MEASURE FOR SHIRT</div>

<form action="" method="POST">
    <div class="container" >
      <div class="row">
        <div class="col-md-6" id="shirtpad">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image\banner.png" class="d-block w-100" alt="..." style="height: 50rem; width:30rem">
    </div>
    <div class="carousel-item">
      <img src="image\banner2.jpg" class="d-block w-100" alt="..." style="height: 50rem;">
    </div>
    <div class="carousel-item">
      <img src="image\sli.jpg" class="d-block w-100" alt="..." style="height: 50rem;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 </div>


 <div class="col-md-6" id="shirtpad">


  <div class="row mt-4" >
      <div class="form-group col-md-6 ">
      <label for="s_collar">SHIRT COLLAR*</label>
      <input type="number" class="form-control" id="s_collar" placeholder="Enter your Size" name="s_collar">
    </div>
    <div class="form-group col-md-6">
      <label for="s_chest">SHIRT CHEST*</label>
      <input type="number" class="form-control" id="s_chest" placeholder="Enter your Size" name="s_chest">
    </div>
    </div>
  <div class="row">
      <div class="form-group col-md-6">
      <label for="s_sleeve_length">SHIRT SLEEVE LENGTH*</label>
      <input type="number" class="form-control" id="s_sleeve_length" placeholder="Enter your Size" name="s_sleeve_length">
    </div>
    <div class="form-group col-md-6">
      <label for="s_shoulder_length">SHIRT SHOULDER LENGTH*</label>
      <input type="number" class="form-control" id="s_shoulder_length" placeholder="Enter your Size" name="s_shoulder_length">
    </div>
    </div>
  <div class="row">
      <div class="form-group col-md-6">
      <label for="s_cuff">SHIRT CUFF*</label>
      <input type="number" class="form-control" id="s_cuff" placeholder="Enter your Size" name="s_cuff">
    </div>
    <div class="form-group col-md-6">
      <label for="s_waist">SHIRT WAIST*</label>
      <input type="number" class="form-control" id="s_waist" placeholder="Enter your Size" name="s_waist">
    </div>
    </div>
  <div class="row">
      <div class="form-group col-md-6">
      <label for="s_shirt_length">SHIRT LENGTH*</label>
      <input type="number" class="form-control" id="s_shirt_length" placeholder="Enter your Size" name="s_shirt_length">
    </div>
    <div class="form-group col-md-6">
      <label for="s_neck">SHIRT NECK*</label>
      <input type="number" class="form-control" id="s_neck" placeholder="Enter your Size" name="s_neck">
    </div>
    </div>
     <div class="form-group form-check" id="checkbtn">
       
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checked" value="checked" style="padding: 1rem">
    <label class="form-check-label" for="exampleCheck1" style="margin-left: 1.4rem">Check me out</label>
    </div>

 </div>


 </div>    
</div>


<!----------------------trouser------------------------------------------------------------------>

    <div style="text-align: center;font-size: 3rem;text-decoration: underline;margin-top: 4rem;margin-bottom:4rem;">MEASURE FOR TROUSER</div>


    <div class="container" >
      <div class="row" >
        <div class="col-md-6" id="shirtpad">


        <div class="row mt-4" >
      <div class="form-group col-md-6 ">
      <label for="t_ankle">TROUSER ANKLE*</label>
      <input type="number" class="form-control" id="t_ankle" placeholder="Enter your Size" name="t_ankle">
    </div>
    <div class="form-group col-md-6">
      <label for="t_seat">TROUSER SEAT*</label>
      <input type="number" class="form-control" id="t_seat" placeholder="Enter your Size" name="t_seat">
    </div>
    </div>
  <div class="row">
      <div class="form-group col-md-6">
      <label for="t_hip">TROUSER HIP*</label>
      <input type="number" class="form-control" id="t_hip" placeholder="Enter your Size" name="t_hip">
    </div>
    <div class="form-group col-md-6">
      <label for="t_langot">TROUSER LANGOT*</label>
      <input type="number" class="form-control" id="t_langot" placeholder="Enter your Size" name="t_langot">
    </div>
    </div>
  <div class="row">
      <div class="form-group col-md-6">
      <label for="t_zip">TROUSER ZIP SIZE*</label>
      <input type="number" class="form-control" id="t_zip" placeholder="Enter your Size" name="t_zip">
    </div>
    <div class="form-group col-md-6">
      <label for="t_thai">TROUSER THAI*</label>
      <input type="number" class="form-control" id="t_thai" placeholder="Enter your Size" name="t_thai">
    </div>
    </div>
  <div class="row">
      <div class="form-group col-md-6">
      <label for="t_length">TROUSER PENT LENGTH*</label>
      <input type="number" class="form-control" id="t_length" placeholder="Enter your Size" name="t_length">
    </div>
    
    </div>
    <div class="form-group form-check" id="checkbtn">
      
    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="checked2" name="checked2" style="padding: 1rem">
    <label class="form-check-label" for="exampleCheck1" style="margin-left: 1.4rem">Check me out</label>
    </div>      
  </div>
        <div class="col-md-6" id="shirtpad">
    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image\banner.png" class="d-block w-100" alt="..." style="height: 50rem;">
    </div>
    <div class="carousel-item">
      <img src="image\banner2.jpg" class="d-block w-100" alt="..." style="height: 50rem;">
    </div>
    <div class="carousel-item">
      <img src="image\sli.jpg" class="d-block w-100" alt="..." style="height: 50rem;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 </div>
 </div>
 <br><br> 
  <br><br> 
   <br><br> 
 <center><button class="btn btn-dark" type="submit" name="selfbtn" style="padding-left: 10rem;padding-right: 10rem;font-size: 2rem;" >CHECKOUT</button></center>
</form>   
</div>



<br>
<br>



<?php
if(isset($_POST['selfbtn'])){
  $s_collar=$_POST['s_collar'];
  $s_chest=$_POST['s_chest'];
  $s_sleeve_length=$_POST['s_sleeve_length'];
  $s_shoulder_length=$_POST['s_shoulder_length'];
  $s_cuff=$_POST['s_cuff'];
  $s_waist=$_POST['s_waist'];
  $s_shirt_length=$_POST['s_shirt_length'];
  $s_neck=$_POST['s_neck'];
  $t_ankle=$_POST['t_ankle'];
  $t_seat=$_POST['t_seat'];
  $t_hip=$_POST['t_hip'];
  $t_langot=$_POST['t_langot'];
  $t_zip=$_POST['t_zip'];
  $t_thai=$_POST['t_thai'];
  $t_length=$_POST['t_length'];
  
  if(isset($_POST['checked'])){
   $checked=$_POST['checked']; 
  }
  
  if(isset($_POST['checked2'])){
   $checked2=$_POST['checked2']; 
  }
  
  // echo $userid;

//-----------------------------when both are checked------------------------------------------------------

$sqla="SELECT * FROM self_measurement1 WHERE u_id='$userid'";
  $resulta=mysqli_query($conn,$sqla);
  $cnt=mysqli_num_rows($resulta);
  if($cnt>0){
    echo "<script>location.href='checkout.php'</script>";
  }
  else
  {

if(isset($checked) && isset($checked2))
{
  if(($_POST['s_collar'] == "") || ($_POST['s_chest'] == "") || ($_POST['s_sleeve_length'] == "") || ($_POST['s_shoulder_length'] == "") || ($_POST['s_cuff'] == "") || ($_POST['s_waist'] == "") || ($_POST['s_shirt_length'] == "") || ($_POST['s_neck'] == "") || ($t_ankle=='') || ($t_seat=='') || ($t_hip=='') || ($t_langot=='') || ($t_zip=='') || ($t_thai=='') || ($t_length==''))
  {
    $selfmsg="all both fields are required";
  }
  else
  {
    
          
            $sqla1="SELECT * FROM measuretype WHERE u_id='$userid'";
                        $resulta1=mysqli_query($conn,$sqla1);
                        $cnt=mysqli_num_rows($resulta1);
                        if($cnt>0){

                          echo "<script>location.href='checkout.php'</script>";
                        }
                        else
                        {
                          $sqlall="INSERT INTO self_measurement1 (u_id,s_collar,s_chest,s_sleeve_length,s_shoulder_length,s_cuff,s_waist,s_shirt_length,s_neck,t_ankle,t_seat,t_hip,t_langot,t_zip_size,t_thai,t_pent_length) VALUES('$userid','$s_collar','$s_chest','$s_sleeve_length','$s_shoulder_length','$s_cuff','$s_waist','$s_shirt_length','$s_neck','$t_ankle','$t_seat','$t_hip','$t_langot','$t_zip','$t_thai','$t_length')";
                          $resultall=mysqli_query($conn,$sqlall);
                          
                        $self_measurement='self_measurement';
                        $sql1a="INSERT INTO measuretype (u_id,measure_type) VALUES('$userid','$self_measurement') ";
                        $result1a=mysqli_query($conn,$sql1a);
                       
                        if($result1a && $resultall){
                          echo "<script>alert('Your Measurement save successfully')</script>";
                          echo "<script>location.href='checkout.php'</script>";
                        }
                        else{
                          echo "no";
                        }
                      }
         
  }
}
else
{
  




  //----------------------------when anyone checked-------------------------------------------------------------------
  
  if(isset($checked) || isset($checked2))
  {
    if(isset($checked))
    {
      if(($_POST['s_collar'] == "") || ($_POST['s_chest'] == "") || ($_POST['s_sleeve_length'] == "") || ($_POST['s_shoulder_length'] == "") || ($_POST['s_cuff'] == "") || ($_POST['s_waist'] == "") || ($_POST['s_shirt_length'] == "") || ($_POST['s_neck'] == ""))
      {
        $selfmsg="all shirt fields are required ";
      }
      else
      {
         
          
            $sqla1="SELECT * FROM measuretype WHERE u_id='$userid'";
                        $resulta1=mysqli_query($conn,$sqla1);
                        $cnt=mysqli_num_rows($resulta1);
                        if($cnt>0){
                          echo "<script>location.href='checkout.php'</script>";
                        }
                        else
                        {
                           $sqlshirt="INSERT INTO self_measurement1 (u_id,s_collar,s_chest,s_sleeve_length,s_shoulder_length,s_cuff,s_waist,s_shirt_length,s_neck) VALUES('$userid','$s_collar','$s_chest','$s_sleeve_length','$s_shoulder_length','$s_cuff','$s_waist','$s_shirt_length','$s_neck')";
                            $resultshirt=mysqli_query($conn,$sqlshirt);
                           
                        $self_measurement='self_measurement';
                        $sql1a="INSERT INTO measuretype (u_id,measure_type) VALUES('$userid','$self_measurement') ";
                        $result1a=mysqli_query($conn,$sql1a);
                       
                        if($result1a){
                          echo "<script>location.href='checkout.php'</script>";
                        }
                        else{
                          echo "no";
                        }
                      }
          
      }
    }
    else
    {

    }

    if(isset($checked2))
    {
      if(($t_ankle=='') || ($t_seat=='') || ($t_hip=='') || ($t_langot=='') || ($t_zip=='') || ($t_thai=='') || ($t_length==''))
      {
        $selfmsg="all pent fields are required";
      }
      else
      {
       
        
          $sqla1="SELECT * FROM measuretype WHERE u_id='$userid'";
                        $resulta1=mysqli_query($conn,$sqla1);
                        $cnt=mysqli_num_rows($resulta1);
                        if($cnt>0){
                          echo "<script>location.href='checkout.php'</script>";
                        }
                        else
                        {
                           $sqlt="INSERT INTO self_measurement1 (u_id,t_ankle,t_seat,t_hip,t_langot,t_zip_size,t_thai,t_pent_length) VALUES('$userid','$t_ankle','$t_seat','$t_hip','$t_langot','$t_zip','$t_thai','$t_length')";
                        $resultt=mysqli_query($conn,$sqlt);
                        
                        $self_measurement='self_measurement';
                        $sql1a="INSERT INTO measuretype (u_id,measure_type) VALUES('$userid','$self_measurement') ";
                        $result1a=mysqli_query($conn,$sql1a);
                         
                        if($result1a && $resultt){
                          echo "<script>alert('self measurement filled successfully...')</script>";
                          echo "<script>location.href='checkout.php'</script>";
                        }
                        else{
                          echo "no";
                        }
                      }
        
      }
    }
    else
    {

    }
  }
  else
  {
      $selfmsg="please correct the checkbox";
  }

}




}


}


?>

<?php
if(isset($selfmsg)){
  echo "<div class='container' style='font-size:1.8rem;padding:.5rem;border:.2rem sloid black;background-color:orange;margin-bottom:3rem;text-align:center;color:white'>".$selfmsg."</div><div>";
}


?>



<?php
include "footer.php";
?>
    <!--   Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html -->>
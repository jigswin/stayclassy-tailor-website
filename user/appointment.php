<?php
   include "header.php";
   include "stayclassydb.php";
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
  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stay.css">
    <link rel="stylesheet" type="text/css" href="css\appointment1.css">


    <title>www.thestayclassy.com</title>
    <style type="text/css">
    #container1 input,select{
      padding:2rem;
    }
   </style>
  </head>
  <body>

     <!---------------------------------------x header start here-------------------------------------->
   

   <div id="innerdrop">
    <div id="innerdrop1"><center>APPOINTMENT</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Appointment</center></div>
   </div>


   <!-------------------------------------------------------------------------------------------->
    <div class="container" id="container1">
    <form action="appointment.php" method="POST">
    <div class="row">
      <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter your name" name="aname">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="aemail">
    </div>
    
  </div>
  <div class="row">
  <div class="form-group col-md-6">
      <label for="mobile">Mobile No</label>
      <input type="text" class="form-control" id="mobile" placeholder="mobile" name="amobile">
  </div>
</div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="add1">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="add2"> 
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputcity" value="Ahmedabad" name="acity"> 
      
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" class="form-control" id="inputstate" value="Gujarat" name="astate"> 
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip Code</label>
      <input type="text" class="form-control" id="inputZip" name="azip">
    </div>
  </div>
  <div class="row">
  <div class="form-group col-md-4">
      <label for="date">Date</label>
      <input type="date" class="form-control" id="date" placeholder="Enter Your Preference Date" name="adate" style="padding: 2rem">
      
    </div>
    <div class="form-group col-md-4">
      <label for="time">Time</label>
      <input type="time" class="form-control" id="time" placeholder="Enter Your Preference Time" name="atime">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">To Time</label>
      <input type="time" class="form-control" id="totime" placeholder="Enter Your Preference To Time" name="atotime">
    </div>
    <input type="hidden" name="appoint_status" value="Pending">
</div>
  <button type="submit" class="btn btn-dark" name="asubmit">Submit</button>
</form>
</div>

    <!-- <a href="checkout.php">ADDRESS</a><br>
    -->

  <?php
  
  if(isset($_POST['asubmit']) && isset($userid)){
    $aname=$_POST['aname'];
    $aemail=$_POST['aemail'];
    $amobile=$_POST['amobile'];
    $add1=$_POST['add1'];
    $add2=$_POST['add2'];
    $acity=$_POST['acity'];
    $astate=$_POST['astate'];
    $azip=$_POST['azip'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $atotime=$_POST['atotime'];
    $appoint_status=$_POST['appoint_status'];
    // echo $userid;
    // echo $appoint_status;

    // if(($aname == "") && ($aemail == "") && ($amobile == "") && ($add1 == "") && ($add2 == "") && ($acity == "") && ($astate == "") && ($azip == "") && ($atime == "") && ($adate == "") && ($atotime == ""))
    if(($_POST['aname']== "") || ($_POST['aemail']== "") || ($_POST['amobile']== "") || ($_POST['add1']== "") || ($_POST['add2']== "") || ($_POST['azip']== "") || ($_POST['adate']== "") || ($_POST['atime']== "") || ($_POST['atotime']== "")) 
    {
      $apdata="all fields are required";
    }
    else
    {
    $dateap=date('Y-m-d'); 
    // echo $adate;
    //  echo $dateap; 
    if($dateap==$adate){
     echo "<script>alert('Please do not choose the present date..')</script>";
    }
    else
    {

   
    
    // if ($resultappoint) {
      // echo "data inserted";

                    $sqla="SELECT u_id FROM measuretype WHERE u_id='$userid'";
                        $resulta=mysqli_query($conn,$sqla);
                        $cnt=mysqli_num_rows($resulta);
                        if($cnt>0){
                           //echo "<script>alert('Please dont choose the present date..')</script>";
                          echo "<script>location.href='checkout.php'</script>";
                        }
                        else
                        {
                        // $sqlap="SELECT appoint_id FROM appointment WHERE u_id='$userid'";
                        // $resultap=mysqli_query($conn,$sqlap);
                        $appointment='appointment';
                        $sql1a="INSERT INTO measuretype (u_id,measure_type) VALUES('$userid','$appointment') ";
                        $result1a=mysqli_query($conn,$sql1a);
                        if($result1a){
                          
                          
                            $sqlappoint="INSERT INTO appointment (u_id, name, address, address_2, city, state, zip, email,a_mobile, a_date, a_time, to_time) VALUES ('$userid','$aname','$add1','$add2','$acity','$astate','$azip','$aemail','$amobile','$adate','$atime','$atotime')";
                              $resultappoint=mysqli_query($conn,$sqlappoint);
                            if($resultappoint){
                              // echo "<script>alert('Your Measurement save successfully')</script>";
                               echo "<script>alert('appointment request sent successfully..')</script>";
                             echo "<script>location.href='checkout.php'</script>";
                                                
                            }
                            else{
                              $apdata="data not inserted";
                                  }
                        
                        }
                        else{
                         // echo "no";
                        }
                      }



      
 
}
  }
  }

  ?>  
  <div class="container" style="margin-bottom: 3rem;margin-top: -2rem"> 
   <div class="row">
  <div class="col-md-6" >
    <?php
     if(isset($apdata)){
      echo '<div style="background-color: grey;color:white;font-size: 2rem;padding: 1rem;text-align: center">'.$apdata.'</div>';
    }
    ?>
  </div>
</div>
</div>



<?php
include "footer.php";
?>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
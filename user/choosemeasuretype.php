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

<div id="innerdrop">
    <div id="innerdrop1"><center>CHOOSE MEASURETYPE</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Choose Measuretype</center></div>
   </div>

<div class="container" style="margin-top: 6rem;margin-bottom: 6rem;">
<div class="row">
	
	<div class="col-md-6">
    <div style="font-size: 2.5rem; margin-bottom: 2rem;margin-left: 2rem;">
<i class="fa fa-certificate" aria-hidden="true" style="margin-right: 2rem"></i> YOU CAN CHOOSE APPOINTMENT ?</div>
    <div style="font-size: 2rem;margin-left: 2rem"><!-- <i class="fa fa-arrow-right" aria-hidden="true" style="margin-right: 2rem"> --></i> Can you choose appointment than you fill up a form and than after we will come to your address and take measurement than after we will start stiching your shirt or trouser and deliver your shipping address..</div>
    <a href="appointment.php" class="btn" style="padding-left: 2rem;padding-right: 2rem;color: white;background-color: black;font-size: 2rem;margin-top: 4rem;margin-bottom: 4rem;margin-left: 2rem" name="appoint">APPOINTMENT</a>
  </div>

  <div class="col-md-6">
    <div style="font-size: 2.5rem; margin-bottom: 2rem;margin-left: 2rem;">
<i class="fa fa-certificate" aria-hidden="true" style="margin-right: 2rem"></i> YOU CAN CHOOSE SELF MEASUREMENT ?</div>
    <div style="font-size: 2rem;margin-left: 2rem;"><!-- <i class="fa fa-arrow-right" aria-hidden="true" style="margin-right: 2rem"> --></i> Can you choose self measurement than you fill up form which you know about your self measure and fill up it than after we will work on your order and deliver as soon as possible..</div>
    
  
	<div class="col-md-6"><a href="selfmeasure.php" class="btn" style="padding-left: 2rem;padding-right: 2rem;color: white;background-color: black;font-size: 2rem;margin-top: 4rem" name="self">SELF MEASUREMENT</a></div>
</div>
</div>
</div>



<?php

// if(isset($_POST['appoint'])){
	// $sqla="SELECT * FROM measuretype WHERE u_id='$userid'";
	// $resulta=mysqli_query($conn,$sqla);
	// $cnt=mysqli_num_rows($resulta);
	// if($cnt>0){
	// 	echo "<script>location.href='appointment.php'</script>";
	// }
	// else
	// {
// 	$appointment='appointment';
// 	$sql1a="INSERT INTO measuretype (u_id,measure_type) VALUES('$userid','$appointment') ";
// 	$result1a=mysqli_query($conn,$sql1a);
// 	if($result1a){
// 		echo "<script>location.href='appointment.php'</script>";
// 	}
// 	else{
// 		echo "no";
// 	}
// }
// }

?>





<?php
include "footer.php";

?>
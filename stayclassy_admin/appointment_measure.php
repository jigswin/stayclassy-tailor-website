<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";
include "admindb.php";

?>

<?php

// if(isset($_POST['appoint_measure_id'])){
//   $id=$_POST['appoint_measure_id'];
// }


//----------------------------------------------------choose measure way------------------------------


 if(isset($_POST['measure'])){
  $appoint_id1=$_POST['appoint_measure_id'];
  $sql117="SELECT * from appointment1 WHERE appoint_id='$appoint_id1'";
  $result117=mysqli_query($conn,$sql117);
  if(mysqli_num_rows($result117)>0){
    while($ap_rows=mysqli_fetch_assoc($result117)){
      $checkstatus=$ap_rows['status'];
    }
  }
  if($checkstatus=='Success'){
    // echo "success";
     echo "<script>location.href='appointment_measure_data.php?ap_id=$appoint_id1'</script>";
  }
  else{
    // echo "pending";
     //echo "<script>location.href='appointment_measure.php'</script>";
  }
  ?>

<?php
 }

?>


<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Appointment Measure </h6>
    </div>
    <div class="card-body">

    
    	
    	<form action="code.php" method="POST">
        <div class="text-primary mb-3" style="text-decoration: underline;font-size: 1.6rem;font-weight: bold">Shirt : </div>
        <div class="row mb-5">
            <input type="hidden" name="appoint_id" value="<?php echo $appoint_id1;?>">
    	<div class="form-group col-lg-3">
         <label> SHIRT COLLAR*</label>
         <input type="text" name="s_collar"  class="form-control" >
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT CHEST*</label>
         <input type="text" name="s_chest"  class="form-control" >
       </div>
       
       <div class="form-group col-lg-3">
         <label> SHIRT SLEEVE LENGTH*</label>
         <input type="text" name="s_sleeve_length"  class="form-control" >
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT SHOULDER LENGTH*</label>
         <input type="text" name="s_shoulder_length" class="form-control" >
       </div>
      <div class="form-group col-lg-3">
         <label> SHIRT CUFF*</label>
         <input type="text" name="s_cuff"  class="form-control" >
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT WAIST*</label>
         <input type="text" name="s_waist"  class="form-control" >
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT LENGTH*</label>
         <input type="text" name="s_length"  class="form-control" >
       </div>
       
       <div class="form-group col-lg-3">
         <label> SHIRT NECK*</label>
         <input type="text" name="s_neck" class="form-control" >
       </div>
     </div>
    <div class="text-primary mb-3" style="text-decoration: underline;font-size: 1.6rem;font-weight: bold">Trouser : </div>
     <div class="row mb-5">
       <div class="form-group col-lg-3">
         <label> TROUSER ANKLE*</label>
         <input type="text" name="t_ankle"  class="form-control" >
       </div>
      <div class="form-group col-lg-3">
         <label> TROUSER SEAT*</label>
         <input type="text" name="t_seat"  class="form-control" >
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER HIP*</label>
         <input type="text" name="t_hip"  class="form-control" >
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER LANGOT*</label>
         <input type="text" name="t_langot"  class="form-control" >
       </div>
       
       <div class="form-group col-lg-3">
         <label> TROUSER ZIP SIZE*</label>
         <input type="text" name="t_zip"  class="form-control" >
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER THAI*</label>
         <input type="text" name="t_thai" class="form-control" >
       </div>
      <div class="form-group col-lg-3">
         <label> TROUSER LENGHT*</label>
         <input type="text" name="t_length" class="form-control" >
       </div>
      </div>
      <a href="appointment.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-3" name="ap_measure_save">SAVE</button>
    
       </form>


     

   </div>
</div>
</div>




<?php

include "includes/footer.php";

?>
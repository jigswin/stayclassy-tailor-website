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
if(isset($_POST['edit_btn'])){
 $ap_measure_edit_id=$_POST['appoint_measure_id'];
 $sql1="SELECT * FROM appointment_measure1 WHERE ap_measure_id='$ap_measure_edit_id'";
      $result1=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0){
          while($rows=mysqli_fetch_assoc($result1)){
           $s_collar_edit=$rows['s_collar'];
           $s_chest_edit=$rows['s_chest'];
           $s_sleeve_length_edit=$rows['s_sleeve_length'];
           $s_shoulder_length_edit=$rows['s_shoulder_length'];
           $s_cuff_edit=$rows['s_cuff'];
           $s_waist_edit=$rows['s_waist'];
           $s_length_edit=$rows['s_shirt_length'];
           $s_neck_edit=$rows['s_neck'];
           $t_ankle_edit=$rows['t_ankle'];
           $t_seat_edit=$rows['t_seat'];
           $t_hip_edit=$rows['t_hip'];
           $t_langot_edit=$rows['t_langot'];
           $t_zip_edit=$rows['t_zip'];
           $t_thai_edit=$rows['t_thai'];
           $t_length_edit=$rows['t_pent_length'];
         

           // $sql2="UPDATE appointment_measure SET s_collar='$s_collar_edit',s_chect='$s_chest_edit',s_sleeve_length='$s_sleeve_length_edit',s_shoulder_length='$s_shoulder_length_edit',s_cuff='$s_cuff_edit',s_waist='$s_waist_edit',s_shirt_length='$s_length_edit',s_neck='$s_neck_edit',t_ankle='$t_ankle_edit',t_seat='$t_ankle_edit',t_hip='$t_hip_edit',t_langot='$t_langot_edit',t_zip='$t_zip_edit',t_thai='$t_thai_edit',t_pent_length='$t_length_edit' WHERE ap_measure_id='$ap_measure_edit_id'";
           // $result2=mysqli_query($conn,$sql2);
           // if($result2){
           //  $_SESSION['status']="Your Data Is Inserted";
           //  $_SESSION['status_code']="success";
           //  header("Location:appointment.php");
           // }
           // else{
           //  $_SESSION['status']="Your Data Is Not Inserted";
           //  $_SESSION['status_code']="error";
           //  header("Location: appointment.php");
           // }

           
         }
          }   
      }     


?>



<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Appointment Measure Data Edit </h6>
    </div>
    <div class="card-body">

    
      
      <form action="code.php" method="POST">
        <input type="hidden" name="ap_id" value="<?php echo $ap_measure_edit_id;?>">
        <div class="text-primary mb-3" style="text-decoration: underline;font-size: 1.6rem;font-weight: bold">Shirt : </div>
        <div class="row mb-5">
            
      <div class="form-group col-lg-3">
         <label> SHIRT COLLAR*</label>
         <input type="text" name="s_collar"  class="form-control" value="<?php echo $s_collar_edit;?>" >
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT CHEST*</label>
         <input type="text" name="s_chest"  class="form-control" value="<?php echo $s_chest_edit;?>">
       </div>
       
       <div class="form-group col-lg-3">
         <label> SHIRT SLEEVE LENGTH*</label>
         <input type="text" name="s_sleeve_length"  class="form-control" value="<?php echo $s_sleeve_length_edit;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT SHOULDER LENGTH*</label>
         <input type="text" name="s_shoulder_length" class="form-control" value="<?php echo $s_shoulder_length_edit;?>">
       </div>
      <div class="form-group col-lg-3">
         <label> SHIRT CUFF*</label>
         <input type="text" name="s_cuff"  class="form-control" value="<?php echo $s_cuff_edit;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT WAIST*</label>
         <input type="text" name="s_waist"  class="form-control" value="<?php echo $s_waist_edit;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT LENGTH*</label>
         <input type="text" name="s_length"  class="form-control" value="<?php echo $s_length_edit;?>" >
       </div>
       
       <div class="form-group col-lg-3">
         <label> SHIRT NECK*</label>
         <input type="text" name="s_neck" class="form-control" value="<?php echo $s_neck_edit;?>" >
       </div>
     </div>
    <div class="text-primary mb-3" style="text-decoration: underline;font-size: 1.6rem;font-weight: bold">Trouser : </div>
     <div class="row mb-5">
       <div class="form-group col-lg-3">
         <label> TROUSER ANKLE*</label>
         <input type="text" name="t_ankle"  class="form-control" value="<?php echo $t_ankle_edit;?>">
       </div>
      <div class="form-group col-lg-3">
         <label> TROUSER SEAT*</label>
         <input type="text" name="t_seat"  class="form-control" value="<?php echo $t_seat_edit;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER HIP*</label>
         <input type="text" name="t_hip"  class="form-control" value="<?php echo $t_hip_edit;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER LANGOT*</label>
         <input type="text" name="t_langot"  class="form-control" value="<?php echo $t_langot_edit;?>">
       </div>
       
       <div class="form-group col-lg-3">
         <label> TROUSER ZIP SIZE*</label>
         <input type="text" name="t_zip"  class="form-control" value="<?php echo $t_zip_edit;?>" >
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER THAI*</label>
         <input type="text" name="t_thai" class="form-control" value="<?php echo $t_thai_edit;?>">
       </div>
      <div class="form-group col-lg-3">
         <label> TROUSER LENGHT*</label>
         <input type="text" name="t_length" class="form-control" value="<?php echo $t_length_edit;?>">
       </div>
      </div>
      <a href="appointment.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-3" name="ap_measure_updat">UPDATE</button>
    
       </form>


     

   </div>
</div>
</div>



 



<?php
include "includes/footer.php";

?>
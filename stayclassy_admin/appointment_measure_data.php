<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";


?>











<!-- Button trigger modal -->
 

      

 






<div class="container-fluid">
<form action="appointment_measure_data_edit.php" method="POST">
  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary text-left">Appointment Measure Data
        
    </div>
    <div class="card-body">
      <?php
      include "admindb.php";
      if(isset($_GET['ap_id'])){
        $appoint_id=$_GET['ap_id'];
      $sql="SELECT * FROM appointment_measure1 WHERE appoint_id='$appoint_id'";
      $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          while($rows=mysqli_fetch_assoc($result)){
           $id=$rows['appoint_id'];
           $ap_measure_id=$rows['ap_measure_id'];
           $s_collar=$rows['s_collar'];
           $s_chest=$rows['s_chest'];
           $s_sleeve_length=$rows['s_sleeve_length'];
           $s_shoulder_length=$rows['s_shoulder_length'];
           $s_cuff=$rows['s_cuff'];
           $s_waist=$rows['s_waist'];
           $s_length=$rows['s_shirt_length'];
           $s_neck=$rows['s_neck'];
           $t_ankle=$rows['t_ankle'];
           $t_seat=$rows['t_seat'];
           $t_hip=$rows['t_hip'];
           $t_langot=$rows['t_langot'];
           $t_zip=$rows['t_zip'];
           $t_thai=$rows['t_thai'];
           $t_pent_length=$rows['t_pent_length'];
           $insert_date=$rows['ap_measure_date'];
           

          }
        }
      
    }
      ?>

       
        <div class="row mb-5">
        <div class="form-group col-lg-3">
         <label> APPOINTMENT MEASURE DATA ID*</label>
         <input type="text" name="appoint_measure_id" value="<?php echo $ap_measure_id;?>" class="form-control">
       </div>
        <div class="form-group col-lg-3">
         <label> APPOINTMENT ID*</label>
         <input type="text" name="appoint_id" value="<?php echo $id;?>" class="form-control">
       </div>
       <div class="form-group col-lg-3">
         <label> MEASURE INSERT DATE*</label>
         <input type="text" name="insert_date" value="<?php echo $insert_date;?>" class="form-control">
       </div>
     </div>
      <div class="text-primary mb-3" style="text-decoration: underline;font-size: 1.6rem;font-weight: bold">Shirt : </div>
        <div class="row mb-5">   
      <div class="form-group col-lg-3">
         <label> SHIRT COLLAR*</label>
         <input type="text" name="s_collar_edit"  class="form-control" value="<?php echo $s_collar;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT CHEST*</label>
         <input type="text" name="s_chest_edit"  class="form-control" value="<?php echo $s_chest;?>">
       </div>
       
       <div class="form-group col-lg-3">
         <label> SHIRT SLEEVE LENGTH*</label>
         <input type="text" name="s_sleeve_length_edit"  class="form-control" value="<?php echo $s_sleeve_length;?>" >
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT SHOULDER LENGTH*</label>
         <input type="text" name="s_shoulder_length_edit" class="form-control" value="<?php echo $s_shoulder_length;?>" >
       </div>
      <div class="form-group col-lg-3">
         <label> SHIRT CUFF*</label>
         <input type="text" name="s_cuff_edit"  class="form-control" value="<?php echo $s_cuff;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT WAIST*</label>
         <input type="text" name="s_waist_edit"  class="form-control" value="<?php echo $s_waist;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> SHIRT LENGTH*</label>
         <input type="text" name="s_length_edit"  class="form-control" value="<?php echo $s_length;?>">
       </div>
       
       <div class="form-group col-lg-3">
         <label> SHIRT NECK*</label>
         <input type="text" name="s_neck_edit" class="form-control" value="<?php echo $s_neck;?>">
       </div>
     </div>
    <div class="text-primary mb-3" style="text-decoration: underline;font-size: 1.6rem;font-weight: bold">Trouser : </div>
     <div class="row mb-5">
       <div class="form-group col-lg-3">
         <label> TROUSER ANKLE*</label>
         <input type="text" name="t_ankle_edit"  class="form-control" value="<?php echo $t_ankle;?>">
       </div>
      <div class="form-group col-lg-3">
         <label> TROUSER SEAT*</label>
         <input type="text" name="t_seat_edit"  class="form-control" value="<?php echo $t_seat;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER HIP*</label>
         <input type="text" name="t_hip_edit"  class="form-control" value="<?php echo $t_hip;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER LANGOT*</label>
         <input type="text" name="t_langot_edit"  class="form-control" value="<?php echo $t_langot;?>">
       </div>
       
       <div class="form-group col-lg-3">
         <label> TROUSER ZIP SIZE*</label>
         <input type="text" name="t_zip_edit"  class="form-control" value="<?php echo $t_zip;?>">
       </div>
       <div class="form-group col-lg-3">
         <label> TROUSER THAI*</label>
         <input type="text" name="t_thai_edit" class="form-control" value="<?php echo $t_thai;?>">
       </div>
      <div class="form-group col-lg-3">
         <label> TROUSER LENGHT*</label>
         <input type="text" name="t_length_edit" class="form-control" value="<?php echo $t_pent_length;?>">
       </div>
       
      <div>
 

    </div>

  </div>
  
    <button type="submit" name="edit_btn" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
    
</form>
<form action="code.php" method="POST">
  <input type="hidden" name="ap_measure_delid" value="<?php echo $ap_measure_id;?>">
  <input type="hidden" name="appoint_measure_delid" value="<?php echo $id;?>">
  <button type="submit" name="del" class="btn btn-danger ml-3" style="position: relative;left: 3rem;top:-2.4rem"> <i class="fa fa-trash" aria-hidden="true"></i></button>
</form>
 <a href="appointment.php" class="btn btn-primary ml-3" style="position: relative;left: 7rem;top:-4.8rem">CANCEL</a>
</div>
<!--- container fluid close------------->







<script src="js\jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.check_email').keyup(function (e) {
      var emailjs=$('.check_email').val();
      $.ajax({
        type:"POST",
        url:"code.php",
        data :{
          "check_submit_btn":1,
          "email_id":emailjs,
        },
        success:function (response){
          // alert(response);
          $('.error_email').text(response);
        }
      });
    });
  });

</script>

<?php

include "includes/footer.php";

?>
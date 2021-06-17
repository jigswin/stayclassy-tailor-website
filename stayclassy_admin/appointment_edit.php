<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";
include "admindb.php";

?>





<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Appointment </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['appoint_edit_btn'])){
    		$id=$_POST['appoint_editid'];
    		$sql="SELECT * FROM appointment1 WHERE appoint_id='$id'";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="appoint_edit_id" value="<?php echo $rows['appoint_id']; ?>">
    	<div class="form-group col-lg-9">
         <label> NAME*</label>
         <input type="text" name="ap_name_edit" value="<?php echo $rows['name']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> ADDRESS*</label>
         <input type="text" name="ap_add_edit" value="<?php echo $rows['address']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> ADDRESS2*</label>
         <input type="text" name="ap_add2_edit" value="<?php echo $rows['address_2']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> CITY*</label>
         <input type="text" name="ap_city_edit" value="<?php echo $rows['city']; ?>" class="form-control" placeholder="Enter Password">
       </div>
      <div class="form-group col-lg-9">
         <label> STATE*</label>
         <input type="text" name="ap_state_edit" value="<?php echo $rows['state']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
       <div class="form-group col-lg-9">
         <label> ZIP CODE*</label>
         <input type="text" name="ap_zip_edit" value="<?php echo $rows['zip']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> EMAIL*</label>
         <input type="text" name="ap_email_edit" value="<?php echo $rows['email']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> MOBILE*</label>
         <input type="text" name="ap_mobile_edit" value="<?php echo $rows['a_mobile']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> APPOINT DATE*</label>
         <input type="hidden" name="ap_date_old" value="<?php echo $rows['a_date']; ?>" class="form-control">
         <input type="date" name="ap_date_edit" value="<?php echo $rows['a_date']; ?>" class="form-control" placeholder="Enter Password">
       </div>
      <div class="form-group col-lg-9">
         <label> TIME*</label>
         <input type="text" name="ap_time_edit" value="<?php echo $rows['a_time']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
       <div class="form-group col-lg-9">
         <label> TO TIME*</label>
         <input type="text" name="ap_totime_edit" value="<?php echo $rows['to_time']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       
      
      <a href="appointment.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="appoint_update_btn">UPDATE</button>
       </form>


       <?php
    		}
    	}
    	?>

   </div>
</div>
</div>




<?php

include "includes/footer.php";

?>
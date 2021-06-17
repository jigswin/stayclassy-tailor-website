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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Self Measurement </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['self_editbtn'])){
    		$id=$_POST['self_editid'];
    		$sql="SELECT * FROM self_measurement3 WHERE self_id='$id'";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="self_edit_id" value="<?php echo $rows['self_id']; ?>">
    	<div class="form-group col-lg-9">
         <label> SHIRT COLLAR*</label>
         <input type="text" name="s_collar_edit" value="<?php echo $rows['s_collar']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> SHIRT CHEST*</label>
         <input type="text" name="s_chest_edit" value="<?php echo $rows['s_chest']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> SHIRT SLEEVE LENGTH*</label>
         <input type="text" name="s_sleeve_length_edit" value="<?php echo $rows['s_sleeve_length']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> SHIRT SHOULDER LENGTH*</label>
         <input type="text" name="s_shoulder_length_edit" value="<?php echo $rows['s_shoulder_length']; ?>" class="form-control" placeholder="Enter Password">
       </div>
      <div class="form-group col-lg-9">
         <label> SHIRT CUFF*</label>
         <input type="text" name="s_cuff_edit" value="<?php echo $rows['s_cuff']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
       <div class="form-group col-lg-9">
         <label> SHIRT WAIST*</label>
         <input type="text" name="s_waist_edit" value="<?php echo $rows['s_waist']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> SHIRT LENGTH*</label>
         <input type="text" name="s_length_edit" value="<?php echo $rows['s_shirt_length']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> SHIRT NECK*</label>
         <input type="text" name="s_neck_edit" value="<?php echo $rows['s_neck']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> TROUSER ANKLE*</label>
         <input type="text" name="t_ankle_edit" value="<?php echo $rows['t_ankle']; ?>" class="form-control" placeholder="Enter Password">
       </div>
      <div class="form-group col-lg-9">
         <label> TROUSER SEAT*</label>
         <input type="text" name="t_seat_edit" value="<?php echo $rows['t_seat']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
       <div class="form-group col-lg-9">
         <label> TROUSER HIP*</label>
         <input type="text" name="t_hip_edit" value="<?php echo $rows['t_hip']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> TROUSER LANGOT*</label>
         <input type="text" name="t_langot_edit" value="<?php echo $rows['t_langot']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> TROUSER ZIP SIZE*</label>
         <input type="text" name="t_zip_edit" value="<?php echo $rows['t_zip_size']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> TROUSER THAI*</label>
         <input type="text" name="t_thai_edit" value="<?php echo $rows['t_thai']; ?>" class="form-control" placeholder="Enter Password">
       </div>
      <div class="form-group col-lg-9">
         <label> TROUSER LENGHT*</label>
         <input type="text" name="t_length_edit" value="<?php echo $rows['t_pent_length']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
      
      <a href="selfmeasurement.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="self_update_btn">UPDATE</button>
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
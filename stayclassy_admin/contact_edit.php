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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Complain </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['con_editbtn'])){
    		$id=$_POST['con_editid'];
    		$sql="SELECT * FROM contact_master WHERE cont_id=$id";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="con_edit_id" value="<?php echo $rows['cont_id']; ?>">
    	<div class="form-group col-lg-9">
         <label> NAME*</label>
         <input type="text" name="con_edit_name" value="<?php echo $rows['cont_name']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> EMAIL ADDRESS*</label>
         <input type="text" name="con_edit_email" value="<?php echo $rows['cont_email']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> MESSAGE*</label>
         <input type="text" name="con_edit_msg" value="<?php echo $rows['cont_msg']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> SUBJECT*</label>
         <input type="text" name="con_edit_subject" value="<?php echo $rows['cont_subject']; ?>" class="form-control" placeholder="Enter Password">
       </div>
      <div class="form-group col-lg-9">
         <label> MOBILE NO.*</label>
         <input type="text" name="con_edit_mobile" value="<?php echo $rows['cont_mobile']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
       <div class="form-group col-lg-9">
         <label> STATUS.*</label>
         <select name="con_edit_status" class="form-control">
          <option><?php echo $rows['c_status']; ?></option>
          <option>Pending</option>
          <option>Success</option>
         </select>
       
       </div>

        
         
      
      <a href="contact.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="con_update_btn">UPDATE</button>
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
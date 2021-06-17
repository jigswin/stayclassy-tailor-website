<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";


?>
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Admin Profile</h6>
    </div>
    <div class="card-body">

    	<?php
    	include "admindb.php";
    	if(isset($_POST['editbtn'])){
    		$id=$_POST['editid'];
    		$sql="SELECT * FROM admin_master WHERE id=$id";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="edit_id" value="<?php echo $rows['id']; ?>">
    	<div class="form-group col-lg-9">
         <label> USERNAME*</label>
         <input type="text" name="edit_username" value="<?php echo $rows['username']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> EMAIL ADDRESS*</label>
         <input type="text" name="edit_email" value="<?php echo $rows['email']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       <div class="form-group col-lg-9">
         <label> PASSWORD*</label>
         <input type="text" name="edit_password" value="<?php echo $rows['password']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> MOBILE NO.*</label>
         <input type="text" name="edit_mobile" value="<?php echo $rows['mobile']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
      <a href="adminregister.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="updatebtn">UPDATE</button>
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
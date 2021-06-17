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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Measure Type</h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['measure_type_editbtn'])){
    		$id=$_POST['measure_type_editid'];
    		$sql="SELECT * FROM measuretype1 WHERE measure_id='$id'";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="measure_type_edit_id" value="<?php echo $rows['measure_id']; ?>">
    	<div class="form-group col-lg-9">
         <label> MEASURE TYPE*</label>
         <input type="text" name="measure_type_edit_name" value="<?php echo $rows['measure_type']; ?>" class="form-control" >
       </div>
       <div class="form-group col-lg-9">
         <label> MEASURE DATE*</label>
         <input type="text" name="measure_type_edit_date" value="<?php echo $rows['measure_date']; ?>" class="form-control" >
       </div>
       
      
      <a href="measure_type.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="measure_type_update_btn">UPDATE</button>
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
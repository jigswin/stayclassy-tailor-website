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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Pattern Sub Category </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['pattern_sub_cate_editbtn'])){
    		$sub_cate_id=$_POST['pattern_sub_cate_editid'];
    		$sql="SELECT * FROM pattern_sub_category WHERE sub_cate_id=$sub_cate_id";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="pat_sub_cate_edit_id" value="<?php echo $rows['sub_cate_id']; ?>">
    	<div class="form-group col-lg-9">
         <label> SUB CATEGORY NAME*</label>
         <input type="text" name="pat_sub_cate_edit_name" value="<?php echo $rows['sub_cate_name']; ?>" class="form-control" placeholder="Enter Username">
       </div>

       
          
       <div class="form-group col-lg-9">
         <label> SUB CATEGORY DESCRIPTION*</label>
         <input type="text" name="pat_sub_cate_edit_description" value="<?php echo $rows['discription']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       
      <a href="pattern_sub_category.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="pat_sub_cate_update_btn">UPDATE</button>
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
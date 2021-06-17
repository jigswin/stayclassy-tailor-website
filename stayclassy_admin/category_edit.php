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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Category </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['cate_editbtn'])){
    		$cate_id=$_POST['cate_editid'];
    		$sql="SELECT * FROM category_master WHERE cate_id=$cate_id";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="cate_edit_id" value="<?php echo $rows['cate_id']; ?>">
    	<div class="form-group col-lg-9">
         <label> NAME*</label>
         <input type="text" name="cate_edit_name" value="<?php echo $rows['cate_name']; ?>" class="form-control" placeholder="Enter category name">
       </div>
       <div class="form-group col-lg-9">
         <label> SUB CATEGORY DESCRIPTION*</label>
         <input type="text" name="cate_edit_description" value="<?php echo $rows['description']; ?>" class="form-control" placeholder="Enter description">
       </div>
      
      
      <a href="category.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="cate_update_btn">UPDATE</button>
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
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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Sub Category </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['sub_cate_editbtn'])){
    		$sub_cate_id1=$_POST['sub_cate_editid'];
    		$sql="SELECT * FROM sub_category WHERE sub_cate_id=$sub_cate_id1";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="sub_cate_edit_id" value="<?php echo $rows['sub_cate_id']; ?>">
    	<div class="form-group col-lg-9">
         <label> SUB CATEGORY NAME*</label>
         <input type="text" name="sub_cate_edit_name" value="<?php echo $rows['sub_cate_name']; ?>" class="form-control" placeholder="Enter Username">
       </div>

       <?php
       include "admindb.php";
       $categorysql="SELECT * FROM category_master";
       $categoryresult=mysqli_query($conn,$categorysql);
       if(mysqli_num_rows($categoryresult)>0){
        ?>
      
        
       <div class="form-group col-lg-9">
         <label>CATEGORY ID*</label>
         
          <select name="sub_cate_edit_cate"  class="form-control" >
          <option value="<?php echo $rows['cate_id']; ?>">Choose Category</option>
          <?php
          foreach ($categoryresult as $cateitem ) {
            ?>
          <option value="<?php echo $cateitem['cate_id']; ?>"><?php echo $cateitem['cate_name']; ?></option>
          <?php
        }
        ?>
         </select>
         
       </div>
        <?php
       }
       else{
        echo "no record";
       }

       ?>
       <div class="form-group col-lg-9">
         <label> SUB CATEGORY DESCRIPTION*</label>
         <input type="text" name="sub_cate_edit_description" value="<?php echo $rows['description']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       
      <a href="sub_category.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="sub_cate_update_btn">UPDATE</button>
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
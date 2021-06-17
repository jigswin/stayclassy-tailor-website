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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Pattern </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['pattern_editbtn'])){
    		$pat_id=$_POST['pattern_editid'];
    		$sql="SELECT * FROM pattern_details WHERE pat_id=$pat_id";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST" enctype="multipart/form-data">
    		<input type="hidden" name="pat_edit_id" value="<?php echo $rows['pat_id']; ?>">
       
        <?php
       include "admindb.php";
       $subcategorysql="SELECT * FROM pattern_sub_category";
       $subcategoryresult=mysqli_query($conn,$subcategorysql);
       if(mysqli_num_rows($subcategoryresult)>0){
        ?>


        <div class="form-group col-lg-9">
         <label>  SUB CATEGORY ID*</label>
         <select  name="pat_edit_sub_cate"  class="form-control" >
         
          <option value="<?php echo $rows['sub_cate_id']; ?>">Choose Sub-category</option>
          <?php
          foreach ($subcategoryresult as $subcateitem ) {
            ?>
          <option value="<?php echo $subcateitem['sub_cate_id']; ?>"><?php echo $subcateitem['sub_cate_name']; ?></option>
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
         <label> PATTERN NAME*</label>
         <input type="text" name="pat_edit_name" value="<?php echo $rows['pat_name']; ?>" class="form-control" placeholder="Enter Product name">
       </div>
       
       <div class="form-group col-lg-9">
         <label> PATTERN PRICE*</label>
         <input type="number" name="pat_edit_price" value="<?php echo $rows['pat_price']; ?>" class="form-control" placeholder="Enter Price">
       </div>
       
       <div class="form-group col-lg-9">
         <label> DESCRIPTION*</label>
         <input type="text" name="pat_edit_description" value="<?php echo $rows['pat_description']; ?>" class="form-control" placeholder="Enter Description">
       </div>
       <div class="form-group col-lg-9">
         <label> UPLOAD IMAGE*</label>
         <input type="hidden" name="pat_img_old" value="<?php echo $rows['pat_img']; ?>">
         <input type="file" name="pat_images" class="form-control"  >
       </div>
       
      <a href="pattern.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="pat_update_btn">UPDATE</button>
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
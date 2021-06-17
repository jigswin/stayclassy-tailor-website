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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Edit Product </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['pro_editbtn'])){
    		$pro_id=$_POST['pro_editid'];
    		$sql="SELECT * FROM product_master WHERE pro_id=$pro_id";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST" enctype="multipart/form-data">
    		<input type="hidden" name="pro_edit_id" value="<?php echo $rows['pro_id']; ?>">

<?php
        include "admindb.php";
        $categorysql="SELECT * FROM category_master";
       $categoryresult=mysqli_query($conn,$categorysql);
       if(mysqli_num_rows($categoryresult)>0){
        ?>


        <div class="form-group col-lg-9">
         <label>  CATEGORY ID*</label>
         <select  name="pro_edit_cate"  class="form-control" >
         
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




        <?php
      
       $subcategorysql="SELECT * FROM sub_category";
       $subcategoryresult=mysqli_query($conn,$subcategorysql);
       if(mysqli_num_rows($subcategoryresult)>0){
        ?>


        <div class="form-group col-lg-9">
         <label>  SUB CATEGORY ID*</label>
         <select  name="pro_edit_sub_cate"  class="form-control" >
         
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
         <label> PRODUCT NAME*</label>
         <input type="text" name="pro_edit_name" value="<?php echo $rows['pro_name']; ?>" class="form-control" placeholder="Enter Product name">
       </div>
       <div class="form-group col-lg-9">
         <label> COLOR*</label>
         <input type="text" name="pro_edit_color" value="<?php echo $rows['pro_color']; ?>" class="form-control" placeholder="Enter Color">
       </div>
       <div class="form-group col-lg-9">
         <label> PRICE*</label>
         <input type="number" name="pro_edit_price" value="<?php echo $rows['pro_price']; ?>" class="form-control" placeholder="Enter Price">
       </div>
       <div class="form-group col-lg-9">
         <label> QUNTITY*</label>
         <input type="text" name="pro_edit_qty" value="<?php echo $rows['pro_qty']; ?>" class="form-control" placeholder="Enter Quntity">
       </div>
       
       <div class="form-group col-lg-9">
         <label> DESCRIPTION*</label>
         <input type="text" name="pro_edit_description" value="<?php echo $rows['description']; ?>" class="form-control" placeholder="Enter Description">
       </div>
       <div class="form-group col-lg-9">
         <label> UPLOAD IMAGE*</label>
         <input type="hidden" name="pro_img_old" value="<?php echo $rows['pro_image']; ?>">
         <input type="file" name="pro_images" class="form-control"  >
       </div>
       
      <a href="product.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="pro_update_btn">UPDATE</button>
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
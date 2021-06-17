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
      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Order Master Edit </h6>
    </div>
    <div class="card-body">

    	<?php
    	
    	if(isset($_POST['order_master_editbtn'])){
    		$id=$_POST['order_master_editid'];
    		$sql="SELECT * FROM checkout1 WHERE c_id=$id";
    		$result=mysqli_query($conn,$sql);
    		foreach($result as $rows){
    			?>
    	
    	<form action="code.php" method="POST">
    		<input type="hidden" name="order_master_edit_id" value="<?php echo $rows['c_id']; ?>">
    	<div class="form-group col-lg-9">
         <label>FIRST NAME*</label>
         <input type="text" name="order_master_edit_fname" value="<?php echo $rows['c_f_name']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> LAST NAME*</label>
         <input type="text" name="order_master_edit_lname" value="<?php echo $rows['c_l_name']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> EMAIL*</label>
         <input type="text" name="order_master_edit_email" value="<?php echo $rows['c_email']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> MOBILE*</label>
         <input type="text" name="order_master_edit_mobile" value="<?php echo $rows['c_mobile']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> ADDRESS 1*</label>
         <input type="text" name="order_master_edit_add1" value="<?php echo $rows['c_add']; ?>" class="form-control" placeholder="Enter Password">
       </div>
      <div class="form-group col-lg-9">
         <label> ADDRESS 2*</label>
         <input type="text" name="order_master_edit_add2" value="<?php echo $rows['c_add2']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
       
       <div class="form-group col-lg-9">
         <label> CITY*</label>
         <input type="text" name="order_master_edit_city" value="<?php echo $rows['c_city']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> STATE*</label>
         <input type="text" name="order_master_edit_state" value="<?php echo $rows['c_state']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> ZIP*</label>
         <input type="text" name="order_master_edit_zip" value="<?php echo $rows['c_zip']; ?>" class="form-control" placeholder="Enter Password">
       </div>
      <div class="form-group col-lg-9">
         <label> QUNTITY*</label>
         <input type="text" name="order_master_edit_qty" value="<?php echo $rows['c_qty']; ?>" class="form-control" placeholder="Enter Mobile Number">
       </div>
       <div class="form-group col-lg-9">
         <label> TOTAL*</label>
         <input type="text" name="order_master_edit_total" value="<?php echo $rows['c_total']; ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group col-lg-9">
         <label> ORDER DATE*</label>
         <input type="text" name="order_master_edit_date" value="<?php echo $rows['c_date']; ?>" class="form-control" placeholder="Enter Email Address">
       </div>
       
       <div class="form-group col-lg-9">
         <label> PAYMENT STATUS*</label>
         <input type="text" name="order_master_edit_pay_status" value="<?php echo $rows['pay_status']; ?>" class="form-control" placeholder="Enter Password">
       </div>
       <div class="form-group col-lg-9">
         <label> RETURN MONEY*</label>
         <select name="order_master_edit_order_return_money" class="form-control">
          <option><?php echo $rows['return_money']; ?></option>
          <option>Return</option>
          <option>No Return</option>
         </select>
       </div>
       <div class="form-group col-lg-9">
         <label> SUB-CATEGORY*</label>
         <select name="order_master_edit_order_status" class="form-control">
          <option><?php echo $rows['order_status']; ?></option>
          <option>Processing Order</option>
          <option>Shipped</option>
          <option>Delivered</option>
          <option>Canceled</option>
        </select>
      </div>
       
      
      <a href="order_master.php" class="btn btn-danger ml-3">CANCEL</a>

      <button type="submit" class="btn btn-success ml-2" name="order_master_update_btn">UPDATE</button>
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

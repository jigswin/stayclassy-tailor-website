<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";


?>
<div class="container-fluid">

  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary text-center">CART</h4>
    </div>
    <div class="card-body">
 <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
		  echo "<h4 class='text-white bg-primary p-2'>".$_SESSION['success']."</h4>";
		  unset($_SESSION['success']);
}
   if(isset($_SESSION['status']) && $_SESSION['status']!= ''){
	  echo "<h4 class='text-white bg-primary p-2'>".$_SESSION['status']."</h4>";
	  unset($_SESSION['status']);
}
?>



      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM cart_details";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>CART ID</td>
              <td>USER ID</td>
              <td>PRODUCT ID</td>
              <td>QUNTITY</td>
              <td>DATE</td>
             
              <td>EDIT</td>
              <td>DELETE</td>
            </tr>
          </thead>
          <tbody>
            <?php
              if(mysqli_num_rows($result)){
                while($rows=mysqli_fetch_assoc($result)){
                ?>
               
            <tr>
              <td><?php echo $rows['cart_id']; ?></td>
              <td><?php echo $rows['u_id']; ?></td>
              <td><?php echo $rows['pro_id']; ?></td>
              <td><?php echo $rows['qty']; ?></td>
              <td><?php echo $rows['cart_date']; ?></td>
              


              
              <td>
                <form action="" method="POST">
                  <input type="hidden" name="editid" value="<?php echo $rows['cart_id']; ?>">
                <button type="submit" class="btn btn-success " name="editbtn">EDIT</button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $rows['cart_id']; ?>">
                <button type="submit" class="btn btn-danger" name="delete_btn">DELETE</button>
              </form>
            </td>
            </tr>
              <?php
               }
              }

            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!--- container fluid close------------->

<?php

include "includes/footer.php";

?>
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
      <h4 class="m-0 font-weight-bold text-primary text-center">PATTERN ORDER</h4>
    </div>
    <div class="card-body">
 



      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM order_pattern2";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>ORDER PATTERN ID</td>
              <td>USER ID</td>
              <td>ORDER ID</td>
              <td>PRODUCT ID</td>
              <td>PATTERN ID</td>
              <td>DATE</td>
              <!-- <td>EDIT</td> -->
              <td>DELETE</td>
            </tr>
          </thead>
          <tbody>
            <?php
              if(mysqli_num_rows($result)){
                while($rows=mysqli_fetch_assoc($result)){
                ?>
               
            <tr>
              <td><?php echo $rows['or_patid']; ?></td>
              <td><?php echo $rows['u_id']; ?></td>
              <td><?php echo $rows['c_id']; ?></td>
              <td><?php echo $rows['pro_id']; ?></td>
              
              <td><?php echo $rows['pat_id']; ?></td>
              <td><?php echo $rows['pat_order_date']; ?></td>
             

              <!-- 
              <td>
                <form action="pattern_order_edit.php" method="POST">
                  <input type="hidden" name="pattern_order_editid" value="<?php echo $rows['o_patid']; ?>">
                <button type="submit" class="btn btn-success " name="pattern_order_editbtn">EDIT</button>
                </form>
            </td> -->
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="pattern_order_delete_id" value="<?php echo $rows['or_patid']; ?>">
                <button type="submit" class="btn btn-danger" name="pattern_order_delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
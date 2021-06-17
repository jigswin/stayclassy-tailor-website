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
      <h4 class="m-0 font-weight-bold text-primary text-center">MEASURE TYPE</h4>
    </div>
    <div class="card-body">
 



      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM measuretype1";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>MEASURE ID</td>
              <td>ORDER ID</td>
              <td> USER ID</td>
              <td>MEASURE TYPE</td>
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
              <td><?php echo $rows['measure_id']; ?></td>
              <td><?php echo $rows['c_id']; ?></td>
              <td><?php echo $rows['u_id']; ?></td>
              <td><?php echo $rows['measure_type']; ?></td>
              <td><?php echo $rows['measure_date']; ?></td>
              
              


              
              <td>
                <form action="measure_type_edit.php" method="POST">
                  <input type="hidden" name="measure_type_editid" value="<?php echo $rows['measure_id']; ?>">
                <button type="submit" class="btn btn-success " name="measure_type_editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="measure_type_delete_id" value="<?php echo $rows['measure_id']; ?>">
                <button type="submit" class="btn btn-danger" name="measure_type_delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
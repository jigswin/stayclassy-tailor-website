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
      <h4 class="m-0 font-weight-bold text-primary text-center">SELF MEASUREMENT DETAILS</h4>
    </div>
    <div class="card-body">
 <!-- <?php
//     if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
// 		  echo "<h4 class='text-white bg-primary p-2'>".$_SESSION['success']."</h4>";
// 		  unset($_SESSION['success']);
// }
//    if(isset($_SESSION['status']) && $_SESSION['status']!= ''){
// 	  echo "<h4 class='text-white bg-primary p-2'>".$_SESSION['status']."</h4>";
// 	  unset($_SESSION['status']);
// }
?> -->



      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM self_measurement3";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>SELF ID</td>
              <td>ORDER ID</td>
              <td>USER ID</td>
              <td>SHIRT COLLAR</td>
              <td>SHIRT CHEST</td>
              <td>SHIRT SLEEVE LENGTH</td>
              <td>SHIRT SOULDER LENGTH</td>
              <td>SHIRT CUFF</td>
              <td>SHIRT WAIST</td>
              <td> SHIRT LENGTH</td>
              <td>SHIRT NECK</td>
              <td>TROUSER ANKLE</td>
              <td>TROUSER SEAT</td>
              <td>TROUSER HEAP</td>
              <td>TROUSER LANGOT</td>
              <td>TROUSER ZIP SIZE</td>
              <td>TROUSER THAI</td>
              <td>TROUSER LENGTH</td>
              <td>REQUEST DATE</td>
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
              <td><?php echo $rows['self_id']; ?></td>
               <td><?php echo $rows['c_id']; ?></td>
              <td><?php echo $rows['u_id']; ?></td>
              <td><?php echo $rows['s_collar']; ?></td>
              <td><?php echo $rows['s_chest']; ?></td>
              <td><?php echo $rows['s_sleeve_length']; ?></td>
              <td><?php echo $rows['s_shoulder_length']; ?></td>
              <td><?php echo $rows['s_cuff']; ?></td>
              <td><?php echo $rows['s_waist']; ?></td>
              <td><?php echo $rows['s_shirt_length']; ?></td>
              <td><?php echo $rows['s_neck']; ?></td>
              <td><?php echo $rows['t_ankle']; ?></td>
              <td><?php echo $rows['t_seat']; ?></td>
              <td><?php echo $rows['t_hip']; ?></td>
              <td><?php echo $rows['t_langot']; ?></td>
              <td><?php echo $rows['t_zip_size']; ?></td>
              <td><?php echo $rows['t_thai']; ?></td>
              <td><?php echo $rows['t_pent_length']; ?></td>
              <td><?php echo $rows['request_date']; ?></td>
             
              <td>
                <form action="selfmeasurement_edit.php" method="POST">
                  <input type="hidden" name="self_editid" value="<?php echo $rows['self_id']; ?>">
                <button type="submit" class="btn btn-success " name="self_editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="self_delete_id" value="<?php echo $rows['self_id']; ?>">
                <button type="submit" class="btn btn-danger" name="self_delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
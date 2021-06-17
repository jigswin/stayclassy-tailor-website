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
      <h4 class="m-0 font-weight-bold text-primary text-center">APPOINTMENT</h4>
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
          $sql="SELECT * FROM appointment1";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>APPOINT ID</td>
              <td>ORDER ID</td>
              <td>USER ID</td>
              <td>NAME</td>
              <td>ADDRESS</td>
              <td>ADDRESS 2</td>
              <td>CITY</td>
              <td>STATE</td>
              <td>ZIP CODE</td>
              <td>EMAIL</td>
              <td>MOBILE NO.</td>
              <td>APPOINT DATE</td>
              <td>TIME</td>
              <td>TO TIME</td>
              <td>DATE</td>
              <td>STATUS</td>
              <td>MEASUREMENT DETAILS</td>
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
              <td><?php echo $rows['appoint_id']; ?></td>
              <td><?php echo $rows['c_id']; ?></td>
              <td><?php echo $rows['u_id']; ?></td>
              <td><?php echo $rows['name']; ?></td>
              <td><?php echo $rows['address']; ?></td>
              <td><?php echo $rows['address_2']; ?></td>
              <td><?php echo $rows['city']; ?></td>
              <td><?php echo $rows['state']; ?></td>
              <td><?php echo $rows['zip']; ?></td>
              <td><?php echo $rows['email']; ?></td>
              <td><?php echo $rows['a_mobile']; ?></td>
              <td><?php echo $rows['a_date']; ?></td>
              <td><?php echo $rows['a_time']; ?></td>
              <td><?php echo $rows['to_time']; ?></td>
              <td><?php echo $rows['request_date']; ?></td>
              

              <td><input type="button" name="" class="btn btn-primary" value="<?php echo $rows['status']; ?>"></td>
              
              <td>
                <form action="appointment_measure.php" method="POST"> 
                 <input type="hidden" name="appoint_measure_id" value="<?php echo $rows['appoint_id']; ?>"> 
                <button type="submit" class="btn btn-dark" name="measure">MEASURE</button>
                </form>
              </td>
              <td>
                <form action="appointment_edit.php" method="POST">
                  <input type="hidden" name="appoint_editid" value="<?php echo $rows['appoint_id']; ?>">
                <button type="submit" class="btn btn-success" name="appoint_edit_btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="appoint_delid" value="<?php echo $rows['appoint_id']; ?>">
                <button type="submit" class="btn btn-danger" name="appoint_del_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
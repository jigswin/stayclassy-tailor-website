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
      <h4 class="m-0 font-weight-bold text-primary text-center">COMPLAINS</h4>
    </div>
    <div class="card-body">
 



      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM contact_master";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>CONTACT ID</td>
              <td>CONTACT NAME</td>
              <td>CONTACT EMAIL</td>
              <td>CONTACT MOBILE</td>
              <td>CONTACT SUBJECT</td>
              <td>CONTACT MESSAGE</td>
              <td>DATE</td>
              <td>STATUS</td>
              
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
              <td><?php echo $rows['cont_id']; ?></td>
              <td><?php echo $rows['cont_name']; ?></td>
              <td><?php echo $rows['cont_email']; ?></td>
              
              <td><?php echo $rows['cont_mobile']; ?></td>
              <td><?php echo $rows['cont_subject']; ?></td>
              <td><?php echo $rows['cont_msg']; ?></td>
              <td><?php echo $rows['cont_date']; ?></td>
              
              <td><input type="button" name="" class="btn btn-primary" value="<?php echo $rows['c_status']; ?>"></td>
              

             

              
              <td>
                <form action="contact_edit.php" method="POST">
                  <input type="hidden" name="con_editid" value="<?php echo $rows['cont_id']; ?>">
                <button type="submit" class="btn btn-success " name="con_editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="con_delete_id" value="<?php echo $rows['cont_id']; ?>">
                <button type="submit" class="btn btn-danger" name="con_delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
if(isset($_POST['reply_btn'])){
  $oldreply=$_POST['oldreply'];
  $reply_id=$_POST['reply_id'];

  echo $oldreply;
}



?>







<?php

include "includes/footer.php";

?>
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
      <h4 class="m-0 font-weight-bold text-primary text-center">FEEDBACK</h4>
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
              <td><?php echo $rows['cont_subject']; ?></td>
              <td><?php echo $rows['cont_mobile']; ?></td>
              <td><?php echo $rows['cont_msg']; ?></td>
              <td><?php echo $rows['cont_date']; ?></td>


              
              <td>
                <form action="" method="POST">
                  <input type="hidden" name="editid" value="<?php echo $rows['cont_id']; ?>">
                <button type="submit" class="btn btn-success " name="editbtn">EDIT</button>
                </form>
            </td>
            <td>
              <form action="" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $rows['cont_id']; ?>">
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
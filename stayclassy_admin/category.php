<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";


?>


<!-- Button trigger modal -->
 

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>


      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
       <div class="form-group">
         <label> CATEGORY NAME*</label>
         <input type="text" name="cate_name1" class="form-control" placeholder="Enter Category Name" Required>
       </div>
       <div class="form-group">
         <label> DESCRIPTION*</label>
         <input type="text" name="cate_description1" class="form-control" placeholder="Enter Category Description" Required>
       </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="cate_btn">Save </button>
      </div>
    </div>
    </form>
    </div>
  </div>
</div> 


<div class="container-fluid">

  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary text-left">Category
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 55rem">Add Category</button>
       
      </h4>
    </div>

    <div class="card-body">
<?php
// if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
//   echo "<h4 class='text-white bg-primary p-2'>".$_SESSION['success']."</h4>";
//   unset($_SESSION['success']);
// }
// if(isset($_SESSION['status']) && $_SESSION['status']!= ''){
//   echo "<h4 class='text-white bg-primary p-2'>".$_SESSION['status']."</h4>";
//   unset($_SESSION['status']);
// }
?>



      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM category_master";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>CATEGORY ID</td>
              <td> CATEGORY NAME</td>
              <td>DESCRIPTION</td>
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
              <td><?php echo $rows['cate_id']; ?></td>
              <td><?php echo $rows['cate_name']; ?></td>
              <td><?php echo $rows['description']; ?></td>
              
              <td>
                <form action="category_edit.php" method="POST">
                  <input type="hidden" name="cate_editid" value="<?php echo $rows['cate_id']; ?>">
                <button type="submit" class="btn btn-success " name="cate_editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="cate_deleteid" value="<?php echo $rows['cate_id']; ?>">
                <button type="submit" class="btn btn-danger" name="cate_deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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







<?php

include "includes/footer.php";

?>
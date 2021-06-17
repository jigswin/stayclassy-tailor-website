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
        <h5 class="modal-title" id="exampleModalLabel">Add Sub-Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>


      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
       <div class="form-group">
         <label>SUB-CATEGORY NAME*</label>
         <input type="text" name="sub_cate_name1" class="form-control" placeholder="Enter Category Name" Required>
       </div>
       <?php
       include "admindb.php";
       $categorysql="SELECT * FROM category_master";
       $categoryresult=mysqli_query($conn,$categorysql);
       if(mysqli_num_rows($categoryresult)>0){
        ?>
      

       <div class="form-group">
         <label>CATEGORY*</label>
         
         <select  name="sub_cate_cate1" class="form-control"  Required>
          <option>Choose Category</option>
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
       <div class="form-group">
         <label>DESCRIPTION*</label>
         <input type="text" name="sub_cate_description1" class="form-control" placeholder="Enter Sub-Category Description" Required>
       </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="sub_cate_btn">Save </button>
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
      <h4 class="m-0 font-weight-bold text-primary text-left">Sub-Category
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" style="margin-left: 53rem">Add Sub-Category</button>
       
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
          $sql="SELECT * FROM sub_category";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>SUB CATEGORY ID</td>
              <td>CATEGORY ID</td>
              <td>SUB CATEGORY NAME</td>
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
              <td><?php echo $rows['sub_cate_id']; ?></td>
              <td><?php echo $rows['cate_id']; ?></td>
              <td><?php echo $rows['sub_cate_name']; ?></td>
              <td><?php echo $rows['description']; ?></td>
              <td>
                <form action="sub_category_edit.php" method="POST">
                  <input type="hidden" name="sub_cate_editid" value="<?php echo $rows['sub_cate_id']; ?>">
                <button type="submit" class="btn btn-success " name="sub_cate_editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="sub_cate_deleteid" value="<?php echo $rows['sub_cate_id']; ?>">
                <button type="submit" class="btn btn-danger" name="sub_cate_deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
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
        <h5 class="modal-title" id="exampleModalLabel">Add Pattern</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>


      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
       <div class="form-group">
         <label> PATTERN NAME*</label>
         <input type="text" name="pattern_name" class="form-control" placeholder="Enter Pattern Name" Required>
       </div>
       <div class="form-group">
         <label> CATEGORY*</label>
         <input type="text" name="pattern_cate" class="form-control" value="Pattern">
       </div>

       <?php
       include "admindb.php";
       $subcategorysql="SELECT * FROM pattern_sub_category";
       $subcategoryresult=mysqli_query($conn,$subcategorysql);
       if(mysqli_num_rows($subcategoryresult)>0){
        ?>

       <div class="form-group">
         <label> SUB-CATEGORY*</label>
         <select name="pattern_sub_cate" class="form-control"  Required>
          <option>Choose Sub-category</option>
          <?php
          foreach ($subcategoryresult as $subcateitem ) {
            ?>
          <option value="<?php echo $subcateitem['sub_cate_id']; ?>"><?php echo $subcateitem['sub_cate_name']; ?></option>
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
         <label> PRICE*</label>
         <input type="text" name="pattern_price" class="form-control" placeholder="Enter Price" Required>
       </div>
    
       <div class="form-group">
         <label> DESCRIPTION*</label>
         <input type="text" name="pattern_description" class="form-control" placeholder="Enter Description" Required>
       </div>
       <div class="form-group">
         <label> UPLOAD IMAGE*</label>
         <input type="file" name="pattern_images" id="pattern_images" class="form-control" Required>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="pattern_btn">Save </button>
      </div>
    </form>
    </div>
  </div>
</div> 



<div class="container-fluid">

  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary text-left">Pattern
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 60rem">Add Pattern</button>
       
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
          $sql="SELECT * FROM pattern_details";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>PATTERN ID</td>
              <TD>CATEGORY ID</TD>
              <td>SUB CATEGORY ID</td>
              <td>PATTERN NAME</td>
              <td>PATTERN PRICE</td>
              <td>DESCRIPTION</td>
              <td>IMAGE</td>
              <td>CREATE DATE</td>
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
              <td><?php echo $rows['pat_id']; ?></td>
              <td><?php echo $rows['pat_cat_name']; ?></td>
              <td><?php echo $rows['sub_cate_id']; ?></td>
              <td><?php echo $rows['pat_name']; ?></td>
              <td><?php echo $rows['pat_price']; ?></td>
              <td><?php echo $rows['pat_description']; ?></td>
              <!-- <td><?php echo $rows['pat_img']; ?></td> -->
               <td><?php echo '<img src="upload/'.$rows['pat_img'].'" width="100rem" height="100rem">' ?></td>
              <td><?php echo $rows['pat_create_date']; ?></td>
              
              <td>
                <form action="pattern_edit.php" method="POST">
                  <input type="hidden" name="pattern_editid" value="<?php echo $rows['pat_id']; ?>">
                <button type="submit" class="btn btn-success " name="pattern_editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="pat_delid" value="<?php echo $rows['pat_id']; ?>">
                <button type="submit" class="btn btn-danger" name="pat_del_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
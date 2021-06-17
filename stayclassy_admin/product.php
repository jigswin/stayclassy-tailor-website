<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";
 include "admindb.php";

?>

<!------------------------------------------------------------------------------------------------------>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="code.php" method="POST" enctype="multipart/form-data">
       <div class="form-group">
         <label> PRODUCT NAME*</label>
         <input type="text" name="pro_name" class="form-control" placeholder="Enter Product Name" Required>
       </div>

     
        

       <?php
      
       $categorysql="SELECT * FROM category_master";
       $categoryresult=mysqli_query($conn,$categorysql);
       if(mysqli_num_rows($categoryresult)>0){
        ?>

       <div class="form-group">
         <label> CATEGORY*</label>
         <select name="pro_cate" class="form-control">
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



       <div>
       <?php
       
       $subcategorysql="SELECT * FROM sub_category";
       $subcategoryresult=mysqli_query($conn,$subcategorysql);
       if(mysqli_num_rows($subcategoryresult)>0){
        ?>

       <div class="form-group">
         <label> SUB-CATEGORY*</label>
         <select name="pro_sub_cate" class="form-control">
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
         <label> COLOR*</label>
         <input type="text" name="pro_color" class="form-control" placeholder="Enter Price" Required>
       </div>
       <div class="form-group">
         <label> PRICE*</label>
         <input type="text" name="pro_price" class="form-control" placeholder="Enter Price" Required>
       </div>
       <div class="form-group">
         <label> QUNTITY*</label>
         <input type="text" name="pro_qty" class="form-control" placeholder="Enter Product Quntity" Required>
       </div>
       <div class="form-group">
         <label> DESCRIPTION*</label>
         <input type="text" name="pro_desc" class="form-control" placeholder="Enter Description" Required>
       </div>
       <div class="form-group">
         <label> UPLOAD IMAGE*</label>
         <input type="file" name="pro_images" id="pro_images" class="form-control" Required>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="productsavebtn">Save </button>
      </div>
    </form>
      </div>
      
    </div>
  </div>
</div>


<!---------------------------------------------------------------------------------------------------->



















<div class="container-fluid">

  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary text-left">Product
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduct" style="margin-left: 60rem">Add Product</button> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 60rem">
          Add Product
        </button>
       
      </h4>
    </div>

     <div class="card-body">
 
      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM product_master";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>PRODUCT ID</td>
              <td>CATEGORY ID</td>
              <td>SUB CATEGORY ID</td>
              <td>PRODUCT NAME</td>
              <td>COLOR</td>
             <td>PRICE</td>
              <td>QUNTITY</td>
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
              <td><?php echo $rows['pro_id']; ?></td>
              <td><?php echo $rows['cate_id']; ?></td>
              <td><?php echo $rows['sub_cate_id']; ?></td>
              <td><?php echo $rows['pro_name']; ?></td>
              <td><?php echo $rows['pro_color']; ?></td>
              <td><?php echo $rows['pro_price']; ?></td>
              <td><?php echo $rows['pro_qty']; ?></td>
              <td><?php echo $rows['description']; ?></td>
              <td><?php echo '<img src="upload/'.$rows['pro_image'].'" width="100rem" height="100rem">' ?></td>
              <td><?php echo $rows['pro_create_date']; ?></td>
              
              <td>
                <form action="product_edit.php" method="POST">
                  <input type="hidden" name="pro_editid" value="<?php echo $rows['pro_id']; ?>">
                <button type="submit" class="btn btn-success " name="pro_editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="pro_delid" value="<?php echo $rows['pro_id']; ?>">
                <button type="submit" class="btn btn-danger" name="pro_del_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
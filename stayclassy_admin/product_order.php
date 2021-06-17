<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";

if(isset($_GET['c_id'])){
  $c_id=$_GET['c_id'];
}
?>
<div class="container-fluid">

  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary text-center">ORDER DETAILS</h4>

    </div>
    <div class="card-body">
 



      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM order_master2 WHERE c_id='$c_id'";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered"  width="100%" cellpadding="0">
          <thead>
            <tr class="bg-primary" style="color: white">
              <th>PRODUCT ID</th>
              <th>PRODUCT PRICE</th>
              <th>QUNTITY</th>
              <th>PATTERN ID</th>
              <th>PATTERN PRICE</th>
              <th>SUB TOTAL</th>
              
              <!-- <td>PATTERN PRICE</td> -->
              
            </tr>
          </thead>
          <tbody>
            <?php
              if(mysqli_num_rows($result)){
                while($rows=mysqli_fetch_assoc($result)){
                  $pro_id=$rows['pro_id'];
                ?>
               
            <tr>
              <td><?php echo $rows['pro_id']; ?></td>
               <td><?php echo $rows['pro_price']; ?></td>
              <td><?php echo $rows['qty']; ?></td>
             
              
              <td>
              <?php
              $sql11="SELECT * FROM order_pattern2 WHERE c_id='$c_id' AND pro_id='$pro_id'";
              $result11=mysqli_query($conn,$sql11);
              if(mysqli_num_rows($result11)){
                while($rows11=mysqli_fetch_assoc($result11)){
                  ?>
                   <?php echo $rows11['pat_id']."<br>"; ?>
                  <!-- <td><?php echo $rows11['pat_price']."<br>"; ?></td> -->
                  <?php
                }
              }

              ?>
              </td>
              <td>
                <?php
              $sql112="SELECT * FROM order_pattern2 JOIN pattern_details ON order_pattern2.pat_id=pattern_details.pat_id WHERE c_id='$c_id' AND pro_id='$pro_id'";
              $result112=mysqli_query($conn,$sql112);
              if(mysqli_num_rows($result112)){
                while($rows112=mysqli_fetch_assoc($result112)){
                  ?>
                  <!-- <?php echo $rows112['pat_id']."<br>"; ?> -->
                 <?php echo $rows112['pat_price']."<br>"; ?>
                  <?php
                }
              }

              ?>
              </td>



               <td><?php echo $rows['sub_total']; ?></td>
             <?php
               }
              }

            ?>
              
              


              
             <!--  <td>
                <form action="product_order_edit.php" method="POST">
                  <input type="hidden" name="product_order_editid" value="<?php echo $rows['or_id']; ?>">
                <button type="submit" class="btn btn-success " name="product_order_editbtn">EDIT</button>
                </form>
            </td> -->
           <!--  <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="product_order_delete_id" value="<?php echo $rows['or_id']; ?>">
                <button type="submit" class="btn btn-danger" name="product_order_delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </form>
            </td> -->
            </tr>
              

          </tbody>
        </table>
      </div>
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="table-responsive">
        <table class="table table-bordered"  width="100%" cellpadding="0">
          <tbody>
            <?php
              $sql231="SELECT * FROM measuretype1 WHERE c_id='$c_id'";
              $result231=mysqli_query($conn,$sql231);
              if(mysqli_num_rows($result231)){
                while($rows231=mysqli_fetch_assoc($result231)){
                  $measuretype=$rows231['measure_type'];
                }
              }

              ?>
            <tr>
              <th  >MEASURE TYPE :</th>
              <td class="bg-success" style="color: white;font-size: 1.3rem;"><?php echo $measuretype; ?></td>
            </tr>
          
          </tbody>
          </table>
       </div>
     </div>
        <div class="col-md-6 ">
      <div class="table-responsive">
        <table class="table table-bordered"  width="100%" cellpadding="0">
          <tbody>
            <?php
              $sql23="SELECT * FROM checkout1 WHERE c_id='$c_id'";
              $result23=mysqli_query($conn,$sql23);
              if(mysqli_num_rows($result23)){
                while($rows23=mysqli_fetch_assoc($result23)){
                  $allgst=$rows23['c_allgst'];
                  $c_total=$rows23['c_total'];
                  $c_grandtotal=$rows23['c_grandtotal'];
                }
              }

              ?>
            <tr>
              <th>TOTAL :</th>
              <td><?php echo $c_total; ?></td>
            </tr>
             <tr>
              <th>ALL TAXES INCLUDED : </th>
              <td><?php echo $allgst; ?></td>
            </tr>
             <tr class="bg-dark">
              <th style="color: white;font-size: 1.3rem">GRANDTOTAL :</th>
              <td style="color: white; font-size: 1.3rem;"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $c_grandtotal; ?></td>
            </tr>
          
          
          </tbody>
          </table>
      </div>
    </div>
    </div>
      <a style="" href="order_master.php" class="btn btn-danger">CANCEL</a>
  </div>

</div>
<!--- container fluid close------------->

<?php

include "includes/footer.php";

?>
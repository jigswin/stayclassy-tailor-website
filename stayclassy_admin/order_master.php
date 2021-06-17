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
      <h4 class="m-0 font-weight-bold text-primary text-center">ORDER MASTER</h4>
    </div>
    <div class="card-body">
 



      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM checkout1";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>ORDER ID</td>
              <td>USER ID </td>
              <td>FIRST NAME</td>
              <td>LAST NAME</td>
              <td>EMAIL</td>
              <td>MOBILE</td>
              <td>ADDRESS 1</td>
              <td>ADDRESS 2</td>
              <td>CITY</td>
              <td>STATE</td>
              <td>ZIP</td>
              <td>QUNTITY</td>
              <td>TOTAL</td>
              <td>TAX</td>
              <td>GRAND TOTAL</td>
              <td>ORDER DATE</td>
              <td>ORDER STATUS</td>
              <td>RETURN MONEY</td>
              <td>PAYMENT STATUS</td>
               <td>ORDER DETAIL</td>
              <td>INVOICE</td>
              <td>EDIT</td>
              <td>DELETE</td>
            </tr>
          </thead>
          <tbody>
            <?php
              if(mysqli_num_rows($result)){
                while($rows=mysqli_fetch_assoc($result)){
                  $c_id=$rows['c_id'];
                ?>
               
            <tr>
              <td><?php echo $rows['c_id']; ?></td>
              <td><?php echo $rows['u_id']; ?></td>
              <td><?php echo $rows['c_f_name']; ?></td>
              <td><?php echo $rows['c_l_name']; ?></td>
              <td><?php echo $rows['c_email']; ?></td>
              <td><?php echo $rows['c_mobile']; ?></td>
              <td><?php echo $rows['c_add']; ?></td>
              <td><?php echo $rows['c_add2']; ?></td>
              
              <td><?php echo $rows['c_city']; ?></td>
              
              <td><?php echo $rows['c_state']; ?></td>
              <td><?php echo $rows['c_zip']; ?></td>
              <td><?php echo $rows['c_qty']; ?></td>
              <td><?php echo $rows['c_total']; ?></td>
              <td><?php echo $rows['c_allgst']; ?></td>
              <td><?php echo $rows['c_grandtotal']; ?></td>
              <td><?php echo $rows['c_date']; ?></td>
              <td><?php echo $rows['order_status']; ?></td>
              <td><?php echo $rows['return_money']; ?></td>

              <td><?php echo $rows['pay_status']; ?></td>
              <td>
              <a href="product_order.php?c_id=<?php echo $c_id;?>"><u>More Info</u></a>
            </td>
               <td>
                <form action="bill.php" method="POST">
                  <input type="hidden" name="bill_id" value="<?php echo $rows['c_id']; ?>">
                <button type="submit" class="btn btn-dark " name="print_btn">PRINT</button>
                </form>
            </td>
            
              
              <td>
                <form action="order_master_edit.php" method="POST">
                  <input type="hidden" name="order_master_editid" value="<?php echo $rows['c_id']; ?>">
                <button type="submit" class="btn btn-success " name="order_master_editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="order_master_delete_id" value="<?php echo $rows['c_id']; ?>">
                <button type="submit" class="btn btn-danger" name="order_master_delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
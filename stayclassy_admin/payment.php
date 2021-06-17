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
      <h4 class="m-0 font-weight-bold text-primary text-center">PAYMENT</h4>
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
?>
 -->


      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM payment_master";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>PAYMENT ID</td>
              <td>ORDER ID</td>
              <td>M ID</td>
              <td>TXN ID</td>
              <td>BANKTXN ID</td>
              <td>TXN AMOUNT</td>
              <td>CURRENCY</td>
              <td>STATUS</td>
              <td>RESP CODE</td>
              <td>RESP MSG</td>
              <td>GATEWAY NAME</td>
              <td>BANK NAME</td>
              <td>PAYMENT MODE</td>
              <td>CHECKSUM HASH</td>
              <td>TXN DATE</td>
              <td>DELETE</td>
            </tr>
          </thead>
          <tbody>
            <?php
              if(mysqli_num_rows($result)){
                while($rows=mysqli_fetch_assoc($result)){
                ?>
               
            <tr>
              <td><?php echo $rows['pay_id']; ?></td>
              <td><?php echo $rows['c_id']; ?></td>
              <td><?php echo $rows['pay_or_id']; ?></td>
              <td><?php echo $rows['mid']; ?></td>
              <td><?php echo $rows['txnid']; ?></td>
              <td><?php echo $rows['txnamount']; ?></td>
             <td><?php echo $rows['currency']; ?></td>
              <td><?php echo $rows['status']; ?></td>
              <td><?php echo $rows['respcode']; ?></td>
              <td><?php echo $rows['respmsg']; ?></td>
              <td><?php echo $rows['gatewayname']; ?></td>
              <td><?php echo $rows['bankname']; ?></td>
              <td><?php echo $rows['paymentmode']; ?></td>
              <td><?php echo $rows['checksumhash']; ?></td>
              <td><?php echo $rows['txndate']; ?></td>
              



              
              
            <td>
              <form action="code.php" method="POST">
                <input type="hidden" name="pay_delete_id" value="<?php echo $rows['pay_id']; ?>">
                <button type="submit" class="btn btn-danger" name="pay_delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";
include "admindb.php";
?>

<h3 style="color:grey;font-weight: bold;"><center><u>USER REPORT</u></center></h3>
<div class="card" style="width: 28rem;margin-left: 27rem;margin-top: 4rem;background-color:rgb(166, 89, 89)">
  <div class="card-body">
    <form action="" method="POST">
    <div class="form-group col-md-12">
      <label for="from" style="color:white">FROM : </label>
      <input type="date" class="form-control" id="from" value="" name="from_date"> 
      
    </div>
    <div class="form-group col-md-12">
      <label for="to" style="color:white">TO : </label>
      <input type="date" class="form-control" id="to" value="" name="to_date"> 
      
    </div>
    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" style="margin-left: 9rem;" name="submit_date">SUBMIT</button>
    </form>
  </div>
</div>

<?php
if(isset($_POST['from_date']) || isset($_POST['to_date'])){

  $from_date=$_POST['from_date'];
  $to_date=$_POST['to_date'];
}

?>



<?php
if(isset($_POST['submit_date'])){
 
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $sql="SELECT * FROM user_master WHERE register_date between '$from_date' AND '$to_date' order by register_date";
    $result=mysqli_query($conn,$sql);
?>
<div class="container" style="margin-top: 5rem">
  <div class="card">
  <div class="card-body">
<table class="table table-bordered"   width="100%" cellpadding="0">
          <thead>
            <tr>
              <th>USER ID</th>
              <th>USERNAME</th>
              <th>EMAIL ADDRESS</th>
              <th>PASSWORD</th>
              <th>MOBILE NO.</th>
              <th>REGISTER DATE</th>
            </tr>
          </thead>
          <tbody>
<?php
    if(mysqli_num_rows($result)>0){


      while($rows=mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <td><?php echo $rows['u_id']; ?></td>
          <td><?php echo $rows['u_name']; ?></td>
          <td><?php echo $rows['email']; ?></td>
          <td><?php echo $rows['password']; ?></td>
          <td><?php echo $rows['mobile']; ?></td>
          <td><?php echo $rows['register_date']; ?></td>
        </tr>

        <?php

      }
    }
    else{
      echo "<tr><td colspan='6'><center>USER NOT FOUND</center></td></tr>";
    }
?>

</tbody>
</table>
</div>
</div>
</div>

<form action="user_report_print.php" method="POST">
  <input type="hidden" name="from_date" value="<?php echo $from_date; ?>">
  <input type="hidden" name="to_date" value="<?php echo $to_date; ?>">
<center><button type="submit" class="btn btn-dark pl-5 pr-5 mt-5 mb-5" name="printuser">PRINT</button></center>
</form>

<?php
}
?>

<!----------------------------------------------------------------------------------------------------->

 







  <?php

include "includes/footer.php";

?>

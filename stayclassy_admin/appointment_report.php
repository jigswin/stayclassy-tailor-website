<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";
include "admindb.php";
?>

<h3 style="color:grey;font-weight: bold;"><center><u>APPOINTMENT REPORT</u></center></h3>
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
    <div class="form-group col-md-12">
         <label style="color:white" for="status">STATUS : </label>
         <select name="status" class="form-control" id="status" >
          <option>All</option>
          <option>Pending</option>
          <option>Success</option>
          
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" style="margin-left: 9rem;" name="submit_date">SUBMIT</button>
    </form>
  </div>
</div>

<?php
if(isset($_POST['from_date']) || isset($_POST['to_date'])){

  $from_date=$_POST['from_date'];
  $to_date=$_POST['to_date'];
  $status=$_POST['status'];
}

?>



<?php
if(isset($_POST['submit_date'])){
  $from_date=$_POST['from_date'];
  $to_date=$_POST['to_date'];
  $status=$_POST['status'];
  if((isset($from_date)) || (isset($to_date))){

  
         if($status=='Pending'){
          $sql="SELECT * FROM appointment1 WHERE status='Pending' AND request_date between '$from_date' and '$to_date'  order by request_date";
         }
         elseif($status=='Success'){
          $sql="SELECT * FROM appointment1 WHERE status='Success' AND request_date between '$from_date' and '$to_date' order by request_date";
         }
         else{
          $sql="SELECT * FROM appointment1 WHERE request_date AND request_date between '$from_date' and '$to_date' order by request_date";
         }
  }
 
 
    else{

    }
 

 
    
   
    $result=mysqli_query($conn,$sql);
?>
<div class="container" style="margin-top: 5rem">
  <div class="card">
  <div class="card-body">
<table class="table table-bordered"   width="100%" cellpadding="0">
          <thead>
            <tr>
              <th>APPOINT ID</th>
              <th>NAME</th>
             <th>ADDRESS</th>
               <th>MOBILE</th>
              <th>CITY</th>
              <th>STATE</th>
              <th>ZIP</th>
              <th>STATUS</th>
             
              <th>FROM TIME </th>
              <th>TO TIME</th>
               <th>APPOINT DATE</th>
            </tr>
          </thead>
          <tbody>
<?php
    if(mysqli_num_rows($result)>0){


      while($rows=mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <td><?php echo $rows['appoint_id']; ?></td>
          <td><?php echo $rows['name']; ?></td>
          <td><?php echo $rows['address']." ".$rows['address_2']; ?></td>
          
         
          <td><?php echo $rows['a_mobile']; ?></td>
          <td><?php echo $rows['city']; ?></td>
          <td><?php echo $rows['state']; ?></td>
          <td><?php echo $rows['zip']; ?></td>
          <td><?php echo $rows['status']; ?></td>
         
          <td><?php echo $rows['a_time']; ?></td>
          <td><?php echo $rows['to_time']; ?></td>
           <td><?php echo $rows['a_date']; ?></td>
        </tr>

        <?php

      }
    }
    else{
      echo "<tr><td colspan='11'><center>APPOINTMENT NOT FOUND</center></td></tr>";
    }
?>

</tbody>
</table>
</div>
</div>
</div>

<form action="appointment_report_print.php" method="POST">
  <input type="hidden" name="from_date" value="<?php echo $from_date; ?>">
  <input type="hidden" name="to_date" value="<?php echo $to_date; ?>">
  <input type="hidden" name="status" value="<?php echo $status; ?>">
<center><button type="submit" class="btn btn-dark pl-5 pr-5 mt-5 mb-5" name="print_appoint_user">PRINT</button></center>
</form>

<?php
}
?>

<!----------------------------------------------------------------------------------------------------->

 







  <?php

include "includes/footer.php";

?>


<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";
include "admindb.php";
?>

<h3 style="color:grey;font-weight: bold;"><center><u>PATTERN REPORT</u></center></h3>
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
         <label style="color:white" for="search">SEARCH : </label>
         <input type="text" class="form-control" id="search" value="" name="search"> 
    </div>

    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" style="margin-left: 9rem;" name="submit">SUBMIT</button>
    </form>
  </div>
</div>

<?php
if(isset($_POST['from_date']) || isset($_POST['to_date'])){

  $from_date=$_POST['from_date'];
  $to_date=$_POST['to_date'];
  $search=$_POST['search'];
}

?>



<?php
if(isset($_POST['submit'])){
  $from_date=$_POST['from_date'];
  $to_date=$_POST['to_date'];
  $search=$_POST['search'];
  if((isset($from_date)) || (isset($to_date))){

   $sql="SELECT * FROM pattern_details WHERE (pat_name LIKE '%$search%' OR pat_id LIKE '%$search%' OR pat_price LIKE '%$search%' OR sub_cate_id LIKE '%$search%' OR pat_description LIKE '%$search%') AND  pat_create_date between '$from_date' AND '$to_date' ORDER BY  pat_create_date";
  
    
  }
   $result=mysqli_query($conn,$sql);
    
?>
<div class="container" style="margin-top: 5rem">
  <div class="card">
  <div class="card-body">
<table class="table table-bordered"   width="100%" cellpadding="0">
          <thead>
            <tr>
              <th>PATTERN ID</th>
             <th>SUB CATE ID</th>
               <th>NAME</th>
              <th>PRICE</th>
              <th>DESCRIPTION</th>
             <th> DATE</th>
            </tr>
          </thead>
          <tbody>
<?php
    if(mysqli_num_rows($result)>0){


      while($rows=mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <td><?php echo $rows['pat_id']; ?></td>
          <td><?php echo $rows['sub_cate_id']; ?></td>
          <td><?php echo $rows['pat_name']; ?></td>
          <td><?php echo $rows['pat_price']; ?></td>
          <td><?php echo $rows['pat_description']; ?></td>
          <td><?php echo $rows['pat_create_date']; ?></td>
          
        </tr>

        <?php

      }
    }

    else{
      echo "<tr><td colspan='11'><center>PATTERN NOT FOUND</center></td></tr>";
    }
?>

</tbody>
</table>
</div>
</div>
</div>

<form action="pattern_report_print.php" method="POST">
  <input type="hidden" name="from_date" value="<?php echo $from_date; ?>">
  <input type="hidden" name="to_date" value="<?php echo $to_date; ?>">
  <input type="hidden" name="search" value="<?php echo $search; ?>">
<center><button type="submit" class="btn btn-dark pl-5 pr-5 mt-5 mb-5" name="print_pattern">PRINT</button></center>
</form>

<?php
}
?>

<!----------------------------------------------------------------------------------------------------->

 







  <?php

include "includes/footer.php";

?>


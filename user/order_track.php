<?php
include "stayclassydb.php";
if(isset($_POST)){
	$track_btn=$_POST['track_btn'];
	$c_id=$_POST['c_id'];
	$sql="SELECT * FROM checkout1 where c_id='$c_id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_assoc($result)){
			$order_status=$rows['order_status'];
		}
	}
	if($order_status=='Processing Order'){
		echo "<h1 style='margin-top:10%'><center>ORDER ID : ".$c_id."</center></h1>";

		echo "<h1 ><center>Order in Process..</h1></center>";
	}
	elseif ($order_status=='Shipped') {
		echo "<h1 style='margin-top:10%'><center>ORDER ID : ".$c_id."</center></h1>";
		echo "<h1><center>Order has been Shipped</center></h1>";
	}
	elseif ($order_status=='Delivered') {
		echo "<h1 style='margin-top:10%'><center>ORDER ID : ".$c_id."</center></h1>";
		echo "<h1><center>Order has been Delivered...</center></h1>";
	}
	else{
		echo "<h1 style='margin-top:10%'><center>Your order has been Canceled..</center></h1>";
	}
}



?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

    <title>ProWebHill Private Limited</title>
  </head>
  <body>
    <center><a href="order_history.php" class="btn btn-success" style="margin-top:2rem;padding-right: 2rem;padding-left: 2rem;">Back</a></center>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>



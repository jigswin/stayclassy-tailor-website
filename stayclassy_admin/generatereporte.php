<?php
session_start();
if(!$_SESSION['username']){
    header("Location:../login.php");
    exit();
}
include "includes/header.php";
include "admindb.php";
?>
<style type="text/css">
	#REPORT a{
		color: grey;
		text-decoration: none;

	}
	#REPORT a:hover{
		color: red;
	}

</style>

<h3 style="color:grey;font-weight: bold;"><center><u>GENERATE REPORTS</u></center></h3>
<div class="container" id="REPORT">
	<ol type="1" style="margin-top: 5rem;font-size: 1.5rem">
		<li style="margin-top: 1rem;"><a href="user_report.php">USER REPORT</a></li>
		<li style="margin-top: 1rem;"><a href="product_report.php">PRODUCT REPORT</a></li>
		<li style="margin-top: 1rem;"><a href="pattern_report.php">PATTERN REPORT</a></li>
		<li style="margin-top: 1rem;"><a href="complaint_report.php">COMPLAINT REPORT</a></li>
		<li style="margin-top: 1rem;"><a href="order_report.php">ORDER REPORT</a></li>
		<li style="margin-top: 1rem;"><a href="appointment_report.php">APPOINTMENT REPORT</a></li>
		</ol>

	
</div>








<?php
include "includes/footer.php";
?>
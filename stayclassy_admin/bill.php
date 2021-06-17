<?php
include "admindb.php";

if(isset($_POST['print_btn'])){
	$bill_id=$_POST['bill_id'];
	//echo $bill_id;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>www.thestayclassy.com</title>
  </head>
  <body>
    <div class="container mt-5 bg-light p-5">
		<div>
			<!-- <h1><u>STAY CLASSY</u></h1>
			<h5 style="position: relative;top: -.8rem;color: black;left: .5rem;">The Gentlemen's Choice</h5> -->
			<h4>STAY CLASSY CLOATHING COMPANY</h4>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p>23,Samarpan Arcade,
					Nandej-Barejadi,<br>
					Dist : Daskroi,<br>
					City : Ahmedabad,<br>
					State : Gujarat.<br>
					Zip : 382435
				</p>
				<br>
				<br>
				<h5><u>BILL TO</u></h5>
				<?php
				$sql="SELECT * FROM checkout1 WHERE c_id='$bill_id'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
					while($rows=mysqli_fetch_assoc($result)){
						$c_f_name=$rows['c_f_name'];
						$c_l_name=$rows['c_l_name'];
						$c_email=$rows['c_email'];
						$c_add=$rows['c_add'];
						$c_add2=$rows['c_add2'];
						$c_mobile=$rows['c_mobile'];
						$c_city=$rows['c_city'];
						$c_state=$rows['c_state'];
						$c_zip=$rows['c_zip'];
						$c_total=$rows['c_total'];
						$tax=$rows['c_allgst'];

					}
				}

				?>
				<div>Order Id : STAY00<?php echo $bill_id;?></div>
				<div>Customer Name : <?php echo $c_f_name ;?> <?php echo $c_l_name ;?></div>
				<div>Email : <?php echo $c_email;?></div>
				<div>Mobile No : <?php echo $c_mobile;?></div>
				<div>Address : <?php echo $c_add;?> , <?php echo $c_add2;?> ,</div>
				<div>City : <?php echo $c_city;?> , </div>
				<div>State : <?php echo $c_state;?> .</div>
				<div>Zip : <?php echo $c_zip;?></div>
				

			</div>
			<div class="col-md-6">
				<p><center>Date : <?php $datebill=date('d-m-Y'); echo $datebill;?></center></p>
				
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12">
					<table class="table table-bordered">
			  				<thead class="thead-dark">
			    				<tr>
			      					<th scope="col">Description</th>
			     				 	<th scope="col">Quntity</th>
			     				 	<th scope="col">Unit Price</th>
			     				 	<th scope="col">Sub Total</th>
			      
			    				</tr>
		  					</thead>
		  					<tbody>
		  						
		  						<?php
		  						$pro_price=0;
		  						$sql2="SELECT * from order_master2 JOIN product_master ON order_master2.pro_id=product_master.pro_id WHERE c_id='$bill_id'";
		  						$result2=mysqli_query($conn,$sql2);
		  						if(mysqli_num_rows($result2)>0){
		  							while($prows=mysqli_fetch_assoc($result2)){
		  								$sub_total=$prows['sub_total'];
		  								$qty=$prows['qty'];
		  								$pro_price=$sub_total/$qty;
		  							?>

		    					<tr>
		    						<td><?php echo $prows['pro_name'];?></td>
		      						<td><?php echo $prows['qty'];?></td>
		      						<td><?php echo $pro_price;?></td>
		      						<td><?php echo $prows['sub_total'];?></td>
		      						
		      					</tr>
		      						<?php
		  							}
		  						}
		  						?>
		  						<tr>
		  							<td>All Tax Included </td>
		  							<td>-</td>
		  							<td>-</td>
		  							
		  							<td><?php echo $tax; ?></td>
		  						</tr>
		  						<thead class="thead-light">
		  							<tr>
		  								<th colspan="3" style="text-align: right">TOTAL : </th>
		  								<th><?php  $grandtotal=$c_total+$tax; echo $grandtotal;?></th>
		  							</tr>
		  						</thead>
		    
		  					</tbody>
					</table>

			</div>
		</div><br>
		<br><br>
		<h2 style="color: red"><center>THANK YOU FOR YOUR BUSINESS :)</center></h2>
	</div>


	<script type="text/javascript">
		window.print();
	</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
	
</body>
</html>
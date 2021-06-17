<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stay.css">
    <link rel="stylesheet" type="text/css" href="stay2.css">
    <link rel="stylesheet" type="text/css" href="css\searchpage.css">


    <title>www.thestayclassy.com</title>
    
    <style type="text/css">
    body{
    	background-image: url("image/serchpage.jpg");
    	background-repeat: no-repeat;
    	background-size: cover;
			
    }
		input{
			border-top: none;
			border-left:none;
			border-right:none;
			position: relative;
			top:15rem;
			left: 50rem;
			font-size: 5rem;
			background:
			transparent;

		}
		input:hover{
			border-top: none;
			border-left:none;
			border-right:none;
		}
		#btn{
			position: relative;
			top: 15rem;
			left: 50rem;
			font-size: 3rem;
			padding-right: 1rem;
			padding-left: 1rem;
			
		}
		#closeserch{
			font-size: 3rem;
			position: relative;
			left: 145rem;
			top: 2rem;
			color: white;
			background-color: black;
			padding:1rem;
			
		}
		
	</style>
  </head>
  <body >
	<a href="index.php"><i class="fa fa-times" aria-hidden="true" id="closeserch"></i></a>
	<form action="" method="POST">
		<input type="text" placeholder="Search here" name="str">
		<button class="btn btn-success" id="btn" type="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	</form>

<?php
 	include 'stayclassydb.php';
if(isset($_POST['submit'])){
	$str=mysqli_real_escape_string($conn,$_POST['str']);
	$sql="SELECT * FROM product_master WHERE pro_name like '%$str%' or pro_color like '%$str%'";
	$result=mysqli_query($conn,$sql);

	?>
	<div class="container">
      <div class="row" id="allproduct">
      	<?php
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			// echo $row['pro_name']."<br>";
			// echo $row['pro_id'];
			?>
			<div class="col-3">
        <form action="" method="POST">
       <a href="singleproduct.php?pro_id=<?php echo $row['pro_id'];?>"><?php echo '<img src="../stayclassy_admin/upload/'.$row['pro_image'].'">'; ?> </a>
      <center><h2><?php echo $row['pro_name']; ?></h2></center>
      <center><p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $row['pro_price']; ?></p></center>

      <!-- <input type="hidden" name="pro_name" value="<?php echo $pro_name;?>">
       <input type="hidden" name="pro_price" value="<?php echo $pro_price;?>">
       <input type="hidden" name="images" value="<?php echo $images;?>"> -->
        
      
       <!-- <center><a href="" name="add_to_cart" class="btn btn-danger">Add To Cart</a></center> -->

       <!-- <?php echo $productlessqty; ?> -->
     </form>
      </div>

	<?php		
		}
	}
	else{
		?>
		<img src="image\nodata3.jpg" height="400rem">
		<?php
	}
}




 ?>
 </div>
</div>
</body>
</html>
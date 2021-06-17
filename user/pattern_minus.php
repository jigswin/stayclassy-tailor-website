<?php
include "header.php";
include "stayclassydb.php";

if(isset($_SESSION['email'])){
$useremail=$_SESSION['email'];


  $usersql="SELECT * from user_master WHERE email='$useremail'";
   $userresult= mysqli_query($conn,$usersql);
   if(mysqli_num_rows($userresult)>0){
      while($useridrows = mysqli_fetch_assoc($userresult))
       {
      $userid= $useridrows['u_id'];
   }
 }
 else{
  echo "no id";
 }
 }
?>


<?php
if(isset($_POST['decbtn'])) {
  $pro_minus_id=$_POST['minusid']; 
  $updateqty=$_POST['minusqty'];
  
  if($updateqty==1){
     echo "<script>location.href='cart.php'</script>";
  }
 
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

     <link rel="stylesheet" type="text/css" href="stay.css">
     <link rel="stylesheet" type="text/css" href="css\pattern.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>www.thestayclassy.com</title>
    <style type="text/css">
      #headerline{
        display: none;
      }
      @media (max-width: 991px){
        #headerline{
          display:block;
        }
        
      }
    </style>
  </head>
  <body>
  <hr id="headerline">
   <!-- <div id="innerdrop">
    <div id="innerdrop1"><center>ANY ONE PATTERN DELETE</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / DELETE Pattern</center></div>
   </div>
 -->

 <div class="container" style="margin-top: 2rem">
  <div style="border:.2rem solid orange;color: black;padding: 1rem;font-size: 1.8rem">
   
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please delete one pattern you don't want for stiching shirt or trouser..
  </div>
</div>

  <!-- <div class="container">
   <div class="row" id="allproduct">
   	<?php
   	$sqlpat="SELECT * FROM pattern_details,pattern_order_master1 WHERE pattern_details.pat_id=pattern_order_master1.pat_id AND pro_id='$pro_minus_id'";
   	$resultpat=mysqli_query($conn,$sqlpat);
   	if(mysqli_num_rows($resultpat)>0){
   		while($patrows=mysqli_fetch_assoc($resultpat)){
   			$or_id=$patrows['pat_order_id'];
   			?>
   	
 -->
     <!--  <div class="col-3">
        
       <?php echo '<img src="../stayclassy_admin/upload/'.$patrows['pat_img'].'">'; ?>
      <center><h2><?php echo $patrows['pat_name']; ?></h2></center>
      <center><p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $patrows['pat_price']; ?></p></center>
 -->
      <!-- <input type="hidden" name="pro_name" value="<?php echo $pro_name;?>">
       <input type="hidden" name="pro_price" value="<?php echo $pro_price;?>">
       <input type="hidden" name="images" value="<?php echo $images;?>"> -->
        
      <!--  <form action="" method="POST">  -->
        
       <!-- <center><a href="pattern.php?pat_id=<?php echo $rows['pat_id']; ?>&&u_id=<?php echo $userid; ?>" name="add_to_cart" class="btn btn-danger">Add To Cart</a></center>  -->
       <!-- <input type="text" name="order_id" value="<?php echo $or_id;?>">
       <input type="text" name="pro_id" value="<?php echo $pro_minus_id;?>">
       <input type="text" name="user_id" value="<?php echo $userid;?>">
       <input type="text" name="minusqty" value="<?php echo $updateqty;?>" >
       <button class="btn btn-danger" type="submit" name="pattern_del">DELETE</button>
     </form> 
       
    
      </div>
      <?php
  	}
   	}

   	?>    
    

</div>
</div>
 -->
<!-------------------------------------------------------------------------------------------------->


<div class="featured container no-gutter"  >

        <div class="row posts">
            
              <?php
                $sqlpat="SELECT * FROM pattern_details,pattern_order_master1 WHERE pattern_details.pat_id=pattern_order_master1.pat_id AND pro_id='$pro_minus_id'";
                  $resultpat=mysqli_query($conn,$sqlpat);
                  if(mysqli_num_rows($resultpat)>0){
                    while($patrows=mysqli_fetch_assoc($resultpat)){
                      $or_id=$patrows['pat_order_id'];
                    
              ?>
              <div id="1" class="item new col-md-3 card-pattern" style="transition: transform 0.5s;">
                <div class="featured-item">
                  <?php echo '<img style="height:30rem" src="../stayclassy_admin/upload/'.$patrows['pat_img'].'">'; ?>
                  <h4 style="color:black"><?php echo $patrows['pat_name']; ?></h4>
                  <h6 style="color:black"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $patrows['pat_price']; ?></h6>
                  
                   <form action="" method="POST"> 
        
                   <!-- <center><a href="pattern.php?pat_id=<?php echo $rows['pat_id']; ?>&&u_id=<?php echo $userid; ?>" name="add_to_cart" class="btn btn-danger">Add To Cart</a></center>  -->
                   <input type="hidden" name="order_id" value="<?php echo $or_id;?>">
                   <input type="hidden" name="pro_id" value="<?php echo $pro_minus_id;?>">
                   <input type="hidden" name="user_id" value="<?php echo $userid;?>">
                   <input type="hidden" name="minusqty" value="<?php echo $updateqty;?>" >
                   <button class="btn " type="submit" name="pattern_del" style="font-size: 1.7rem;background-color: red;color: white;padding-left: 1rem;padding-right: 1rem;">DELETE</button>
                 </form> 
       
                </div>
                </div>

                  <?php
                }
              }
            ?>
        </div>
    </div>






<!----------------------------delete pattern ----------------------------------------------------------->

<?php

if(isset($_POST['pattern_del']) && isset($_POST['user_id'])){
	$pro_id=$_POST['pro_id'];
	$order_id=$_POST['order_id'];
	$updateqty=$_POST['minusqty'];
	$u_id=$_POST['user_id'];
	$sqldel="DELETE FROM pattern_order_master1 WHERE pat_order_id='$order_id'";
	$resultdel=mysqli_query($conn,$sqldel);
	if($resultdel){
		$updateqty=$updateqty-1;
		$sqlorder="UPDATE cart_details SET qty='$updateqty' WHERE pro_id='$pro_id' AND u_id='$u_id'";
		$resultorder=mysqli_query($conn,$sqlorder);
		if($resultorder){
     echo "<script>alert('Product Quntity less successfully..')</script>";
			echo "<script>location.href='cart.php'</script>";

		}
		else{
			echo "not delete";
		}
	}
}

?>




<?php

include "footer.php";

?>
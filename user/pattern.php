<?php
   include "header.php";
   include "stayclassydb.php";
//    if(!$_SESSION['username']){
//     header("Location:login.php");
//     exit();
// }
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

// -----------------------------------------add to cart product--------------------------------------------
if(isset($_POST['add_to_cart']))
{

  $pro_id=$_POST['pro_id'];
  $proless_qty=$_POST['proless_qty'];

  $u_id=$_POST['us_id'];
  $updateqty=$_POST['updateqty'];
  $sql3="SELECT pro_id from cart_details where pro_id='$pro_id' AND u_id='$u_id'";
  $result3=mysqli_query($conn,$sql3);
  $cnt=mysqli_num_rows($result3);
  if($proless_qty==0){
     echo "<script>alert('Product is Out Of Stock')</script>";
     echo "<script>location.href='shop.php'</script>";
  }
  elseif($cnt>0)
        {
          echo "<script>alert('Product is already added')</script>";
          echo "<script>location.href='shop.php'</script>";

        }
        else
        {

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
    .card-pattern:hover{
      transform: translateY(-1rem);
    }
  </style>  
  </head>

  <body>
  
   <div id="innerdrop">
    <div id="innerdrop1"><center>PATTERN</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Pattern</center></div>
   </div>
<div class="container" style="margin-top: 2rem">
  <div style="border:.2rem solid orange;color: black;padding: 1rem;font-size: 1.8rem">
   
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please choose a pattern you want to stiching on your shirt or trouser..
  </div>
</div>

<!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page" style="margin-top: -6rem">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              
              <h1>Featured Patterns</h1>
              <div class="line-dec"></div>
            </div>
          </div>
         <!--  <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group" style="font-size:2rem;">
              <button class="btn btn-primary" data-filter="*">All Patterns</button>
              <button class="btn btn-primary" data-filter=".new">Shirt</button>
              <button class="btn btn-primary" data-filter=".low">Trouser</button>
              
            </div>
          </div> -->
        </div>
      </div>
    </div>





 <div class="featured container no-gutter" style="margin-bottom: 3rem;" >

        <div class="row posts">
            
              <?php
                  $sql="SELECT * from pattern_details";
                  $result=mysqli_query($conn,$sql);
                   if(mysqli_num_rows($result)>0){
                  while($rows=mysqli_fetch_array($result)){
                    $pat_name=$rows['pat_name'];
                    $pat_price=$rows['pat_price'];
                    $images=$rows['pat_img'];
                    $pat_id1=$rows['pat_id'];
                    
              ?>
              <div id="1" class="item new col-md-3 card-pattern" style="transition: transform 0.5s;">
                <div class="featured-item">
                  <?php echo '<img style="height:30rem" src="../stayclassy_admin/upload/'.$rows['pat_img'].'">'; ?>
                  <h4 style="color:black"><?php echo $rows['pat_name']; ?></h4>
                  <h6 style="color:black"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows['pat_price']; ?></h6>
                  <form action="" method="POST"> 
        
                     <!-- <center><a href="pattern.php?pat_id=<?php echo $rows['pat_id']; ?>&&u_id=<?php echo $userid; ?>" name="add_to_cart" class="btn btn-danger">Add To Cart</a></center> -->
                     <input type="hidden" name="patt_id" value="<?php echo $pat_id1;?>">
                     <input type="hidden" name="pro_id_patt" value="<?php echo $pro_id;?>">
                     <input type="hidden" name="user_id_patt" value="<?php echo $u_id;?>">
                     <button class="btn btn-danger" type="submit" name="pattern_add" style="font-size: 1.7rem;background-color: red;color: white;padding-left: 1rem;padding-right: 1rem;">Add to cart</button>
                   </form>
       
                </div>
                </div>

                  <?php
                }
              }
            ?>
        </div>
    </div>

   <!--  <div class="page-navigation" style="margin-top: -8rem"> 
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li class="current-page"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Featred Page Ends Here -->

<!-- <br><br><br><br><br>
<br><br>

 -->











 <!--  <div class="container">
   <div class="row" id="allproduct">
<?php

      if(mysqli_num_rows($result)>0){
    while($rows=mysqli_fetch_array($result)){
      $pat_name=$rows['pat_name'];
      $pat_price=$rows['pat_price'];
      $images=$rows['pat_img'];
      $pat_id1=$rows['pat_id'];
      
?>
      <div class="col-3">
        
       <?php echo '<img src="../stayclassy_admin/upload/'.$rows['pat_img'].'">'; ?>
      <center><h2><?php echo $rows['pat_name']; ?></h2></center>
      <center><p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows['pat_price']; ?></p></center>
 -->
      <!-- <input type="hidden" name="pro_name" value="<?php echo $pro_name;?>">
       <input type="hidden" name="pro_price" value="<?php echo $pro_price;?>">
       <input type="hidden" name="images" value="<?php echo $images;?>"> -->
        
     <!--  <form action="" method="POST">  -->
        
       <!-- <center><a href="pattern.php?pat_id=<?php echo $rows['pat_id']; ?>&&u_id=<?php echo $userid; ?>" name="add_to_cart" class="btn btn-danger">Add To Cart</a></center> -->
       <!-- <input type="hidden" name="patt_id" value="<?php echo $pat_id1;?>">
       <input type="hidden" name="pro_id_patt" value="<?php echo $pro_id;?>">
       <input type="hidden" name="user_id_patt" value="<?php echo $u_id;?>">
       <button class="btn btn-danger" type="submit" name="pattern_add">Add to cart</button>
     </form>
       
    
      </div>
      
    
<?php
    }
  }

?>
</div>
</div> -->
<!-- <div>
	<center><a href="selfmeasure.php"><button type="submit" class="btn btn-danger">SELF MEASUREMENT</button></a>

<a href="appointment.php"><button type="submit" class="btn btn-primary">APPOINTMENT</button></a></center>

</div> -->



<?php
if(isset($_POST['pattern_add']) && isset($_POST['pro_id_patt']) && isset($_POST['user_id_patt'])){
$pro_id=$_POST['pro_id_patt'];
  $u_id=$_POST['user_id_patt'];
  $patt_id=$_POST['patt_id'];
  echo $pro_id;
  echo $patt_id;
  echo $u_id;

          
          
          $sql_query="INSERT INTO cart_details (u_id,pro_id,qty) VALUES('$u_id','$pro_id','1')";
          $result_query=mysqli_query($conn,$sql_query);

          if($result_query)
            {

            $sqlinsert="INSERT INTO pattern_order_master1 (u_id,pro_id,pat_id) VALUES ('$u_id','$pro_id','$patt_id')";
                $resultinsert=mysqli_query($conn,$sqlinsert);
                if($resultinsert){
                  echo "<script>alert(' Add to cart successfully')</script>";
                  echo "<script>location.href='shop.php'</script>";
                }
                else
                {
                  echo "pattern not added";
                }


             }
            else
            {
              echo "<script>alert('!oops an error occured')</script>";
              echo "<script>location.href='shop.php'</script>";
            }  
  }
  

?>

<?php

include "footer.php";

?>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
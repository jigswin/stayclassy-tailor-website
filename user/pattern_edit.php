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
if(isset($_POST['incbtn'])){
  $pro_update_id=$_POST['updateid'];
  $updateqty=$_POST['updateqty'];
 
  // echo $updateqty;
  // echo $pro_update_id;
  

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
    
  </head>
  <body>
  
   <div id="innerdrop">
    <div id="innerdrop1"><center> PATTERN</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Pattern</center></div>
   </div>
<div class="container" style="margin-top: 2rem">
  <div style="border:.2rem solid orange;color: black;padding: 1rem;font-size: 1.8rem">
   
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please choose a pattern you want to stiching on your shirt or trouser..
  </div>
</div>




<!--------------------------------------------------------------------------------------------------->



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
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group" style="font-size:2rem;">
              <button class="btn btn-primary" data-filter="*">All Patterns</button>
              <button class="btn btn-primary" data-filter=".new">Shirt</button>
              <button class="btn btn-primary" data-filter=".low">Trouser</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>





 <div class="featured container no-gutter"  style="margin-bottom: 3rem">

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
                 <input type="hidden" name="pattern_id" value="<?php echo $pat_id1;?>">
                 <input type="hidden" name="pro_id" value="<?php echo $pro_update_id;?>">
                 <input type="hidden" name="userid" value="<?php echo $userid;?>">
                  <input type="hidden" name="updateqty" value="<?php echo $updateqty;?>">
                 <center><button class="btn " type="submit" name="edit_pattern_add" style="font-size: 1.7rem;background-color: red;color: white;padding-left: 1rem;padding-right: 1rem;">Add to cart</button></center>
               </form>
                 
                </div>
                </div>

                  <?php
                }
              }
            ?>
        </div>
    </div>

    
    <!-- Featred Page Ends Here -->










<!-----------------------quntity plus here-------------------------------------------------->

<?php
if(isset($_POST['edit_pattern_add']) && isset($_POST['pattern_id']) && isset($_POST['userid']) && isset($_POST['pro_id'])){
$pro_id=$_POST['pro_id'];
$u_id=$_POST['userid'];
$pattern_id=$_POST['pattern_id'];
$updateqty=$_POST['updateqty'];
echo $updateqty;

    
    $sqlinsert1="INSERT INTO pattern_order_master1 (u_id,pro_id,pat_id) VALUES ('$u_id','$pro_id','$pattern_id')";
    $resultinsert1=mysqli_query($conn,$sqlinsert1);
    if($resultinsert1){
      }
      else
    {
      echo "product not  update";
    }
    $updateqty=$updateqty+1;
      $sqlcart="UPDATE cart_details SET qty='$updateqty' WHERE pro_id='$pro_id' AND u_id='$u_id'";
      $resultcart=mysqli_query($conn,$sqlcart);
      if($resultcart){
        echo "<script>alert('Product Quntity added successfully..')</script>";
        echo "<script>location.href='cart.php'</script>";

        // echo $updateqty;
      }
    else{
    echo "pattern not added";
  }
  }

?>

<!---------------------------quntity minus here------------------------------------------------->

<?php
// if(isset($_POST['edit_pattern_add']) && isset($_POST['pattern_id']) && isset($_POST['userid']) && isset($_POST['pro_id'])){
// $pro_id=$_POST['pro_id'];
// $u_id=$_POST['userid'];
// $pattern_id=$_POST['pattern_id'];
// $updateqty=$_POST['updateqty'];
// echo $updateqty;

    
//     $sqlinsert1="INSERT INTO pattern_order_master (u_id,pro_id,pat_id) VALUES ('$u_id','$pro_id','$pattern_id')";
//     $resultinsert1=mysqli_query($conn,$sqlinsert1);
//     if($resultinsert1){
      
//       $updateqty=$updateqty+1;
//       $sqlcart="UPDATE cart_details SET qty='$updateqty' WHERE pro_id='$pro_id' AND u_id='$u_id'";
//       $resultcart=mysqli_query($conn,$sqlcart);
//       if($resultcart){
//         echo "<script>location.href='cart.php'</script>";
//         // echo $updateqty;
//       }

//     else
//     {
//       echo "product not  update";
//     }
//   }
//   else{
//     echo "pattern not added";
//   }
//   }

?>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
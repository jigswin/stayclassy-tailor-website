<?php
include "header.php";
include "stayclassydb.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  echo "<script> location.href='login.php';</script>";
  exit;
}
 if(isset($_SESSION['email'])){
$useremail=$_SESSION['email'];

  $usersql="SELECT * from user_master WHERE email='$useremail'";
   $userresult= mysqli_query($conn,$usersql);
   if(mysqli_num_rows($userresult)>0){
      while($useridrows = mysqli_fetch_assoc($userresult))
       {
      $userid= $useridrows['u_id'];
      // echo $userid;
      // echo $userid;
   }
 }
 else{
  echo "no id";
 }
  }
  // elseif(isset($_GET['userid'])){
  //   $userid=$_GET['userid'];

  // }
?>

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
    <link rel="stylesheet" type="text/css" href="css\singleproduct.css">
    <title>www.thestayclassy.com</title>
    <style type="text/css">
      #single-img{
        padding-right:7rem;padding-bottom: 2rem;padding-top:2rem;padding-left: 7rem;
       }

        @media (min-width: 767px) and (max-width: 991px){

        #single-img{
         padding-right:3rem;padding-bottom: 2rem;padding-left: 3rem;padding-top:4rem;
        }
      }

      @media (max-width: 460px){

        #single-img{
         padding-right:2rem;padding-bottom: 4rem;padding-left: 2rem;
        }
      }
    </style>
    
  </head>
  <body>
   
<!-- <hr style="color: black" id="hrline"> -->
<?php
  
  if(isset($_GET['pro_id'])){
  $pro_id=$_GET['pro_id'];

  $sql="SELECT * FROM product_master where pro_id='$pro_id'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    while($rows=mysqli_fetch_assoc($result)){
     $pro_name=$rows['pro_name'];
     $pro_price=$rows['pro_price'];
     $pro_image=$rows['pro_image'];
     $description=$rows['description'];
     $productlessqty=$rows['pro_qty'];
     $pro_color=$rows['pro_color'];
    }
  }
}
?>

<?php
  // if(isset($_SESSION['email'])){
    $sqlcart="SELECT * FROM cart_details WHERE pro_id='$pro_id' AND u_id='$userid'";
    $resultcart=mysqli_query($conn,$sqlcart);
      while($cartrows=mysqli_fetch_assoc($resultcart)){
        $updateqty=$cartrows['qty'];
      }
    // }
?> 



<!-- <div class="container single-product">
  	<div class="row">
  		<div class="col-4">
  			<?php echo '<img style="height:40rem" src="../stayclassy_admin/upload/'.$pro_image.'" width="100%">'; ?> 
  		</div>
  		<div class="col-4">
  			
  			<h1> <?php echo $pro_name; ?></h1>
  			<h4><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $pro_price; ?></h4>
       
        <form action="pattern.php" method="POST">
          <input type="text" name="updateqty" class="form-control" value="1" style="height: 3rem;width: 3rem;margin-left: 3rem;">
          <input type="hidden" name="pro_id" value="<?php echo $pro_id;?>" class="form-control">
          <input type="hidden" name="us_id" value="<?php echo $userid;?>" class="form-control">
  			

        
      <br>
  			<h3> Product Details <i class="fa fa-indent"></i></h3>
  			
  			<h4><?php echo $description; ?>
        </h4>
        <br>
      <button class="btn btn-danger" type="submit" name="add_to_cart" style="font-size: 2rem;padding-left: 2rem;padding-right: 2rem;">Add to cart</button>
      
      </form>
  		</div>
  	</div>
  	
  </div>

 -->




<!---------------------------------------------------------------------------------------------------------->

 <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product" style="margin-top: -.1rem;background-image: linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%);padding-bottom: 6rem">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h1 style="font-size: 3rem;margin-left: 2rem;color:black"><center>Single Product</center></h1>
             <center> <div class="line-dec" style="margin-left: 2rem;color:"></div></center>
            </div>
          </div>
          <div class="col-md-6" id="single-img" >
            
                
                  <div style="border:.2rem solid lightblue;padding: 2rem;background-color: white">
                    <?php echo '<img  style="height:32rem" src="../stayclassy_admin/upload/'.$pro_image.'" width="100%">'; ?>
                 
                  <!-- items mirrored twice, total of 12 -->
                </div>
              
          </div>
          <div class="col-md-6" style="padding-right:4rem;padding-bottom: 4rem;padding-left: 4rem;">
            <div class="right-content">
              <h1 style="font-size: 3rem;color: black"><?php echo $pro_name; ?></h1>
              <h3 style="color: black;font-size: 2rem;margin-left: -1rem;margin-top: 1rem"><i class="fa fa-inr" aria-hidden="true" style="color: black"></i> <?php echo $pro_price; ?></h3>
              <h4 style="color: black;font-size: 2rem;margin-top: 1rem"><?php echo $pro_color; ?></h4>
              <p style="font-size: 2rem;color: black"><?php echo $description; ?></p>
                    <span style="color: red;font-size: 2rem;">
                      <?php 
                      if($productlessqty==0){
                        echo "Out of stock";
                      }
                      else{
                        echo $productlessqty." left on stock";
                      }
                    ?>
                     </span>      
              <form action="pattern.php" method="POST">
                <span style="font-size: 2rem;">Quantity:</span><input type="text" name="updateqty" class="form-control" value="1" style="height: 4rem;width: 4rem;margin-top: -.5rem" id="quantity">
                
                 <input type="hidden" name="proless_qty" value="<?php echo $productlessqty;?>" class="form-control">
                <input type="hidden" name="pro_id" value="<?php echo $pro_id;?>" class="form-control">
                <input type="hidden" name="us_id" value="<?php echo $userid;?>" class="form-control">
        
                <button class="btn btn-success" type="submit" name="add_to_cart" style="font-size: 2rem;padding-left: 2rem;padding-right: 2rem;margin-top: 1rem;">Add to cart</button>
              </form>
              <div class="down-content">
                <div class="categories">
                  <h6 style="color:black">Category: <span><a href="#"  style="color: black">Men ,</a><a href="#"  style="color: black">Lifestyle</a></span></h6>
                </div>
                <div class="share">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->

<!------------------------------------------------------------------------------------------------------------->


<!-- Similar Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              
              <h1>You May Also Like</h1>
              <div class="line-dec"></div>
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
              <?php 
                $sql1="SELECT * FROM product_master ORDER BY pro_id desc LIMIT 0,8";
                $result1=mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result1)>0){
                  while($rows1=mysqli_fetch_assoc($result1)){
              ?>
                <div class="featured-item">
                  <a href="singleproduct.php?pro_id=<?php echo $rows1['pro_id'];?>"><?php echo '<img  style="height:30rem" src="../stayclassy_admin/upload/'.$rows1['pro_image'].'" width="100%">'; ?>
                   </a>
                  <h4 style="color: black;font-size: 2.5rem"><?php echo $rows1['pro_name']; ?></h4>
                  <h6 style="color: black;font-size: 2rem"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows1['pro_price']; ?></h6>
                </div>
                 <?php
                    }
                  }

                  ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Similar Ends Here -->










  

<?php
  include "footer.php";
?>




    <!-- Optional JavaScript; choose one of the two -->

     <!-- Option 1: Bootstrap Bundle with Propper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> 

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  
</body>
</html>
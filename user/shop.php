<?php

include "header.php";
include "stayclassydb.php";

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  echo "<script> location.href='login.php';</script>";
  exit;
}

if(isset($_REQUEST['logout'])){
  session_unset();
  session_destroy();
  echo "<script> location.href='login.php';</script>";
}

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


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="stay.css">
     <link rel="stylesheet" type="text/css" href="css\shop1.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>www.thestayclassy.com</title>
    <style type="text/css">
      .card-product:hover{
        transform: translateY(-1rem);
      }
    </style>
    
  </head>
  <body>
     <!---------------------------------------x header start here-------------------------------------->
   <?php
   
   ?>

   <div id="innerdrop">
    <div id="innerdrop1"><center>SHOP</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Shop</center></div>
   </div>

<!----------------------------------- all products--------------------------------------->
 


<?php

  // $sql="SELECT * from product_master";
  // $result=mysqli_query($conn,$sql);
  
  ?>

  <!--  <div class="container">
      <h1 class="title">ALL PRODUCTS</h1>
      </div>
  


 <div class="container " id="container1"> -->
  <!-- <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-9"> -->
     <!--  <div class="row" id="allproduct">
         -->
        <?php

    //     if(mysqli_num_rows($result)>0){
    // while($rows=mysqli_fetch_array($result)){
    //   $pro_name=$rows['pro_name'];
    //   $pro_price=$rows['pro_price'];
    //   $images=$rows['pro_image'];
    //   $pro_id1=$rows['pro_id'];
    //   $productlessqty=$rows['pro_qty'];
?>  
      <!-- <div class="col-3">

        <div class="card" style="background-color:#FCF6F8  ;margin-bottom: 5rem;border-radius: 4rem">
          <a href="singleproduct.php?pro_id=<?php echo $rows['pro_id'];?>"><?php echo '<img style="border-radius:4rem;" class="card-img-top" src="../stayclassy_admin/upload/'.$rows['pro_image'].'">'; ?> </a>
          <div class="card-body">
            <form action="shop.php" method="POST">
           
          <center><h2><?php echo $rows['pro_name']; ?></h2></center>
           <center><p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows['pro_price']; ?></p></center>
          
      
     
      </div>
        </div> -->

      <!-- <input type="hidden" name="pro_name" value="<?php echo $pro_name;?>">
       <input type="hidden" name="pro_price" value="<?php echo $pro_price;?>">
       <input type="hidden" name="images" value="<?php echo $images;?>"> -->
        
      
       <!-- <center><a href="" name="add_to_cart" class="btn btn-danger">Add To Cart</a></center> -->

       <!-- <?php echo $productlessqty; ?> -->
     <!-- </form>
      </div> -->
      
    
      <?php
  //   }
  // }

  ?>


  

  
   
    <!-- <div class="page-btn">
      <span>1</span>
      <span>2</span>
      <span>3</span>
      <span>4</span>
      
    </div> -->
   <!--  </div>
  </div> -->
<!-- </div>
    
</div> -->




 <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              
              <h1>Featured Items</h1>
              <div class="line-dec"></div>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group" style="font-size:2rem;">
              <a href="shop.php" class="btn btn-primary" data-filter="*" style="color: blue">All Products</a>
              <a href="allshirt.php" class="btn btn-primary" data-filter=".new">Shirt</a>
              <a href="alltrouser.php" class="btn btn-primary" data-filter="*">Trouser</a>
              <a href="highprice.php" class="btn btn-primary" data-filter=".new">High Price</a>
              <a href="lowprice.php" class="btn btn-primary" data-filter=".new">Low Price</a> 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="featured container no-gutter">

        <div class="row posts">
            
              <?php
              $limit=8;
              
              if(isset($_GET['page'])){
                $page=$_GET['page'];
              }
              else
              {
                $page=1;
              }

              $offset=($page-1)*$limit;
                    $sql1="SELECT * from product_master order by pro_id desc LIMIT {$offset},{$limit}";
                     $result1=mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($result1)>0){
                while($rows1=mysqli_fetch_array($result1)){

                  $pro_name=$rows1['pro_name'];
                  $pro_price=$rows1['pro_price'];
                  $images=$rows1['pro_image'];
                  $pro_id1=$rows1['pro_id'];
                  $productlessqty=$rows1['pro_qty'];
            ?>  
              <div id="1" class="item new col-md-3 card-product" style="transition: transform 0.5s;">
                <div class="featured-item">
                  <a href="singleproduct.php?pro_id=<?php echo $rows1['pro_id'];?>"><?php echo '<img  style="height:30rem" src="../stayclassy_admin/upload/'.$rows1['pro_image'].'">'; ?> 
                </a>
                  <h4 style="color:black"><?php echo $rows1['pro_name']; ?></h4>
                  <h6 style="color:black"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows1['pro_price']; ?></h6>
                </div>
                </div>

                  <?php
                }
              }
            ?>
        </div>
    </div>

    <div class="page-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
 
              <?php

                $pagesql="SELECT * FROM product_master";
                $pageresult=mysqli_query($conn,$pagesql);

                if(mysqli_num_rows($pageresult)>0){
                  $totalrecords=mysqli_num_rows($pageresult);
                 
                  $totalpages=ceil($totalrecords/$limit);
                  echo '<ul>';
                  if($page>1){
                      echo '<li style="margin-right:.5rem;"><a href="shop.php?page='.($page-1).'"><i class="fa fa-angle-left"></i></a></li>';
                  }
                
                  for($i=1;$i<=$totalpages;$i++){
                    if($i==$page){
                      $active="current-page";
                    }
                    else
                    {
                      $active="";
                    }
                    echo '<li class="'.$active.'" style="margin-right:.5rem;"><a href="shop.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($totalpages > $page){
                     echo '<li style="margin-right:.5rem;"><a href="shop.php?page='.($page+1).'"><i class="fa fa-angle-right"></i></a></li>';

                  }
                  echo '</ul>';
                }

            ?>

            
              
              
              
           
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Page Ends Here -->










<!-------------------------------------------------------------------------->

<script type="text/javascript">
  
  $(document).ready(function(){
    $('#filteropen').click(function(){
      $('.filtercontainer').css("display","block");
    });

    $('#closefilter').click(function(){
      $('.filtercontainer').css("display","none");
    });
  });

</script>




   <!-------- footer start here------------------------------------------------>
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
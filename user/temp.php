<?php
include 'header.php';
include "stayclassydb.php";
// session_destroy();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  echo "<script> location.href='login.php';</script>";
  exit;
}
$useremail=$_SESSION['email'];

  $usersql="SELECT * from user_master WHERE email='$useremail'";
   $userresult= mysqli_query($conn,$usersql);
   if(mysqli_num_rows($userresult)>0){
      while($useridrows = mysqli_fetch_assoc($userresult))
       {
      $userid= $useridrows['u_id'];
      $_SESSION['userid']=$userid;
      
   }
 }
 else{
  echo "no id";
 }

if(isset($_REQUEST['logout'])){
  
  
  session_unset();
  session_destroy();
  echo "<script> location.href='login.php';</script>";

}
?>





<!-----------------------------quntity plus here--------------------------------------------->


<?php

// if(isset($_SESSION['userid'])){
  
// if(isset($_POST['incbtn'])){
//    $updateid=$_POST['updateid'];
//   $updateqty=$_POST['updateqty'];
  
//     $updateqty=$updateqty+1;
//     $sql="UPDATE cart_details SET qty='$updateqty' WHERE pro_id='$updateid' AND u_id='$userid'";
//     $result=mysqli_query($conn,$sql);
//     if($result){
//       echo "cart details added successfully";
//       // echo "<script>location.href='pattern_edit.php'</script>";

//     }
//     else
//     {
//        echo "cart details not added";
//     }
//   }
// } 
?>

<!----------------quntity  minus here------------------------------------------------------------>

<?php

// if(isset($_SESSION['userid'])){
  
// if(isset($_POST['decbtn'])){
//    $updateid=$_POST['updateid'];
//   $updateqty=$_POST['updateqty'];
//   // $updatetotalqty=$_POST['updatetotalqty'];
  
//   if($updateqty==1)
//   {
//      echo "disabled";
//   }
//   else
//   {
//     $updateqty=$updateqty-1;
//     $sql="UPDATE cart_details SET qty='$updateqty' WHERE pro_id='$updateid' AND u_id='$userid'";
//     $result=mysqli_query($conn,$sql);
//     if($result){
//        echo "cart details less successfully";
//     }
//     else
//     {
//        echo "cart details not less";
//     }
//   }  
// }
//  }

?>


<?php
$totalcount=0;
$total=0;
$fetchsql="SELECT qty FROM cart_details WHERE u_id='$userid'";
$fetchresult=mysqli_query($conn,$fetchsql);
if(mysqli_num_rows($fetchresult)>0)
{
  while($fetchrows=mysqli_fetch_assoc($fetchresult))
  {
   $count=$fetchrows['qty'];
   
  $totalcount=$totalcount+$count;
  
   
  }
  
  $_SESSION['totalcount']=$totalcount;

}



?>


<!------------------------------------------------------------------------------------------------------>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--  <link rel="stylesheet" type="text/css" href="stay.css"> -->
    <link rel="stylesheet" type="text/css" href="css\cartpage.css">

    <title>www.thestayclassy.com</title>
    
   </style>
  </head>
  <body>
<div id="innerdrop">
    <div id="innerdrop1"><center>CART</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Cart</center></div>
   </div>
   <form>
     <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
     <button type="submit">ok</button>
   </form>

<div class="container cart-page " >
  <div class="row">
  <div class="col-md-12">
    <div class="row">

      <div class="col-md-12">
  <table>
    <tr>
      <th>Product</th>
      <th>Pattern</th>
      <th>Quntity</th>
      <th>Sub Total</th>
      <th>Remove Item</th>
    </tr>
<?php
  include "stayclassydb.php";
  $cartsql="SELECT * FROM cart_details WHERE u_id='$userid'";
  $cartresult=mysqli_query($conn,$cartsql);
  
  // $subtotal=0;

  if(mysqli_num_rows($cartresult)>0){
    while ($cartrows=mysqli_fetch_assoc($cartresult)) {
      // echo $cartrows['u_id']."<br>";
      // echo $cartrows['cart_id']."<br>";
      $product_id=$cartrows['pro_id'];
      $product_qty=$cartrows['qty'];
      // echo $cartrows['cart_date'];

?>
<?php
// $subtotal=0;
// $fetchsql1="SELECT pat_price FROM pattern_details";
// $fetchresult1=mysqli_query($conn,$fetchsql1);
// if(mysqli_num_rows($fetchresult1)>0)
// {
//   while($fetchrows1=mysqli_fetch_assoc($fetchresult1))
//   {
//    $count1=$fetchrows1['pat_price'];
   
//    $subtotal=$subtotal+$count1;
  
   
//   }
 
  
// }

?>




   
    <tr>
      <td>
<!------------------------------------------------------------------------------------------->
<!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">
          
          <div class="col-md-4">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <?php
    
    $pro_sql="SELECT * FROM product_master WHERE pro_id='$product_id'";
    $pro_result=mysqli_query($conn,$pro_sql);
   
    if(mysqli_num_rows($pro_result)>0){
      while($pro_item=mysqli_fetch_assoc($pro_result)){
        
        // $subtotal=$product_qty*$pro_item['pro_price'];
        // $total=$total+$subtotal;
        $prod_qty= $pro_item['pro_qty'];
        $orderprice=$pro_item['pro_price'];
        $order_pro_id=$pro_item['pro_id'];
   
?>

                  <li>
                    <?php echo '<img  src="../stayclassy_admin/upload/'.$pro_item['pro_image'].'" >'; ?>
                  </li>
                  
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
              <div id="carousel" class="flexslider">
                 
                <ul class="slides" >
                 <?php
          $sqlpattern="SELECT * FROM pattern_details,pattern_order_master1 WHERE pattern_details.pat_id=pattern_order_master1.pat_id AND pro_id='$product_id' AND u_id='$userid'";
            $resultpattern=mysqli_query($conn,$sqlpattern);
            if(mysqli_num_rows($resultpattern)>0){
              while($patternrows=mysqli_fetch_assoc($resultpattern)){
                $pattern_price=$patternrows['pat_price'];
                $pat_order_id=$patternrows['pat_order_id'];
                // $subtotal=0;
                // $subtotal=$subtotal+$pattern_price;
                // echo $pat_order_id;
                ?>
                  <li style="float: right">
                  	<span>
                    <?php echo '<img style="height:10rem;width:10rem;" src="../stayclassy_admin/upload/'.$patternrows['pat_img'].'">'; ?>
                    <p><?php echo $patternrows['pat_price'];?></p>
                </span>
                  </li>
                <?php
        }}
        ?> 
                  <!-- items mirrored twice, total of 12 -->
                </ul>
                  
              </div>
            </div>
          </div>
         

</td>















      <td>
        <div class="cart-info">
          <?php echo '<img  src="../stayclassy_admin/upload/'.$pro_item['pro_image'].'" >'; ?> 
          <div>
          <p><?php echo $pro_item['pro_name']; ?></p>
          <small>Price : <?php echo $pro_item['pro_price']; ?></small>
          
          
        </div>
      </div>
      </td>
      <?php
          // $sqlpatternimg="SELECT * FROM pattern_order_master WHERE pro_id='$product_id' and u_id='$userid'";
          // $resultpatternimg=mysqli_query($conn,$sqlpatternimg);
          // if(mysqli_num_rows($resultpatternimg)>0){
          //   while ($patternimg=mysqli_fetch_assoc($resultpatternimg)) {
          //     $pattern_id1=$patternimg['pat_id'];
          //   }}
            ?>
            

            
          
      <!-- <td style="border:.2rem solid black">
        <div class="row">
          <div class="col-3"> -->
          <?php
          // $sqlpattern="SELECT * FROM pattern_details,pattern_order_master1 WHERE pattern_details.pat_id=pattern_order_master1.pat_id AND pro_id='$product_id' AND u_id='$userid'";
          //   $resultpattern=mysqli_query($conn,$sqlpattern);
          //   if(mysqli_num_rows($resultpattern)>0){
          //     while($patternrows=mysqli_fetch_assoc($resultpattern)){
          //       $pattern_price=$patternrows['pat_price'];
          //       $pat_order_id=$patternrows['pat_order_id'];
                // $subtotal=0;
                // $subtotal=$subtotal+$pattern_price;
                // echo $pat_order_id;
                ?>
          <!-- <?php echo '<img height="10rem" width="20rem" src="../stayclassy_admin/upload/'.$patternrows['pat_img'].'">'; ?>
          <p><?php echo $patternrows['pat_price'];?></p> -->
          <!-- <input type="hidden" name="" value="<?php echo $pat_order_id;?>"> -->
         
     <!--  </div>
        </div>
      </td> -->
      <td>
        
      
        <form action="pattern_edit.php" method="POST">
          <!-- <input type="text" name="updatetotalqty" value="<?php echo $pro_item['pro_qty']; ?>"> -->
          <input type="hidden"  name="updateid" value="<?php echo $pro_item['pro_id'];?>">
          <input type="hidden" name="updateqty" value="<?php echo $cartrows['qty']; ?>">
        <input type="hidden" value="<?php echo $cartrows['qty']; ?>" class="changeqty">
        <span>
          
          <div class="btn-group" role="group" aria-label="Basic example">
          <button type="submit" class="btn btn-secondary" name="incbtn">up</button>
        </form>
         <form action="pattern_minus.php" method="POST">
          <!-- <input type="text" name="updatetotalqty" value="<?php echo $pro_item['pro_qty']; ?>"> -->
          <input type="hidden"  name="minusid" value="<?php echo $pro_item['pro_id'];?>">
          <input type="hidden" name="minusqty" value="<?php echo $cartrows['qty']; ?>">
        <input type="text" value="<?php echo $cartrows['qty']; ?>" class="changeqty">
          <button type="submit" class="btn btn-secondary" name="decbtn">down</button>
           </form>
        </div> 
      
      </span> 
    </td>

      <td><?php 
          $subtotal=0;
        
          $sqlpattern="SELECT pat_price FROM pattern_details,pattern_order_master1 WHERE pattern_details.pat_id=pattern_order_master1.pat_id AND pro_id='$product_id'";
            $resultpattern=mysqli_query($conn,$sqlpattern);
            if(mysqli_num_rows($resultpattern)>0){
              while($patternrows=mysqli_fetch_assoc($resultpattern)){
                $pattern_price=$patternrows['pat_price'];
                
                $subtotal=$subtotal+$pattern_price;
                 }
               }

   

      $allsubtotal=($orderprice*$product_qty)+$subtotal;
      echo $allsubtotal ; 
      


      ?></td>
      <td>
        <form action="cart.php" method="POST">
            <!-- <input type="" name="addtotalqty" value="<?php echo $pro_item['pro_qty']; ?>"> -->
             <input type="hidden" name="userid" value="<?php echo $userid;?>"> 
            <input type="hidden" name="removeproid" value="<?php echo $pro_item['pro_id'];?>">
          <button class="btn btn-danger" type="submit" name="cartremove" style="border-radius: 50%">X</button>
        </form>
      </td>


       </div>
        </div>
      </div>
    </tr>

<?php
      
      }
    }
    $total=$total+$allsubtotal;
    
  }
}

?>

    
  </table>
</div>
</div>

  </div>

<?php


echo $total;


?>


<!--------------------------------------------------------------------------------------------------->
 









<!--------------------------remove cart-------------------------------------------------------->

<?php

if(isset($_SESSION['userid'])){
  if(isset($_POST['cartremove'])){
   
    $removeproid=$_POST['removeproid'];
    $user_id=$_POST['userid'];
     
    $sql3="DELETE from cart_details where pro_id='$removeproid'";
    $result3=mysqli_query($conn,$sql3);
    if($result3)
    {
    
    $sql4="DELETE from pattern_order_master1 where pro_id='$removeproid'";
        $result4=mysqli_query($conn,$sql4);
        if($result4){

               $sql14="DELETE from order_pattern1 where pro_id='$removeproid' AND u_id='$user_id'";
                $result14=mysqli_query($conn,$sql14);
                
                if($result14){
             
                   $sql15="DELETE from order_master1 where pro_id='$removeproid' AND u_id='$user_id'";
                      $result15=mysqli_query($conn,$sql15);
                      
                      if($result15){
                   
                        echo "<script>location.href='cart.php'</script>";
                      }
                       else
                      {
                        echo "order master not deleted";  
                      }
                }
                 else
                {
                  echo "order pattern not deleted";  
                }
     
              }
         else
        {
          echo "pattern order master 1 not deleted";  
        }

    }
    else
    {
      echo "<script>alert('cart not  deleted')</script>";
    } 
  }
}

?>

</div>
</div>
<div class="container" id="checkbtn">
  <form action="cart.php" method="POST"> 
   <input type="hidden" name="or_u_id" value="<?php echo $userid;?>"> 
   <input type="hidden" name="or_pro_id" value="<?php echo $product_id;?>"> 
   <input type="hidden" name="or_pat_order_id" value="<?php echo $pat_order_id;?>"> 
   <input type="hidden" name="or_qty" value="<?php echo $product_qty;?>"> 
   <input type="hidden" name="or_pro_price" value="<?php echo $orderprice;?>"> 
   <input type="hidden" name="or_subtotal" value="<?php echo $allsubtotal;?>"> 
  <button class="btn btn-primary" type="submit" name="ordersave" id="ordersave">Proceed</button>
</form>
  
  <a href="shop.php" class="btn btn-dark" id="continue">Continue shopping</a>

</div>



<!-----------------------------------------------order save----------------------------------------------------------------------->

<?php
include "stayclassydb.php";
if(isset($_POST['ordersave'])){
// $or_pro_id=$_POST['or_pro_id'];
$sub_total=0;
 $or_sql="SELECT * FROM product_master JOIN cart_details ON product_master.pro_id=cart_details.pro_id WHERE u_id='$userid'";
 $or_result=mysqli_query($conn,$or_sql);
 
 if($or_result){
  
  
 while($or_rows=mysqli_fetch_assoc($or_result)){
  $or_u_id=$or_rows['u_id'];
  $or_pro_id=$or_rows['pro_id'];
 
  $or_qty= $or_rows['qty'];
  $or_pro_price= $or_rows['pro_price'];
  // $or_subtotal= $or_rows['or_subtotal'];

  echo $or_u_id."<br>";
  echo $or_pro_id."<br>";
 
  echo $or_qty."<br>";
  echo $or_pro_price."<br>";
  $allsub_total1=$sub_total+($or_qty*$or_pro_price);

  
$pat_price1=0;
$patsql="SELECT * FROM pattern_order_master1 JOIN pattern_details ON pattern_order_master1.pat_id=pattern_details.pat_id WHERE u_id='$or_u_id' AND pro_id='$or_pro_id' ";
$resultpat=mysqli_query($conn,$patsql);
if(mysqli_num_rows($resultpat)>0){
  while($patrows=mysqli_fetch_assoc($resultpat)){
    $pat_id1=$patrows['pat_id'];
    $pat_price2=$patrows['pat_price'];
    // echo $pat_price2;
    // echo $pat_id1;
 $pat_price1=$pat_price1+$pat_price2;
   }

  }
// echo $pat_price1;
// echo $allsub_total1;
$finalsub_total=$pat_price1+$allsub_total1;
echo $finalsub_total;



  $sql9="SELECT pro_id FROM order_master1 WHERE pro_id='$or_pro_id' AND u_id='$or_u_id'";
  $result9=mysqli_query($conn,$sql9);
  if(mysqli_num_rows($result9)>0){
      echo "<script>alert('order already saved')</script>";
      // $updatesql="UPDATE order_master1 SET qty='$or_qty',sub_total='$finalsub_total' WHERE pro_id='$or_pro_id' AND u_id='$or_u_id'";
      // $updateresult=mysqli_query($conn,$updatesql);
      // $updatesql1="UPDATE order_master2 SET qty='$or_qty',sub_total='$finalsub_total' WHERE pro_id='$or_pro_id' AND u_id='$or_u_id'";
      // $updateresult1=mysqli_query($conn,$updatesql1);

        echo "<script>location.href='choosemeasuretype.php';</script>";

  }
  else
  {
    
  
   $sql6="INSERT INTO order_master1 (u_id,pro_id,qty,pro_price,sub_total) VALUES('$or_u_id','$or_pro_id','$or_qty','$or_pro_price','$finalsub_total') ";
    $result6=mysqli_query($conn,$sql6);
    if($result6){

      //update query for order_master 1 and 2

      // $updatesql="UPDATE order_master1 SET qty='$or_qty',sub_total='$finalsub_total' WHERE pro_id='$or_pro_id' AND u_id='$or_u_id'";
      // $updateresult=mysqli_query($conn,$updatesql);
      // $updatesql1="UPDATE order_master2 SET qty='$or_qty',sub_total='$finalsub_total' WHERE pro_id='$or_pro_id' AND u_id='$or_u_id'";
      // $updateresult1=mysqli_query($conn,$updatesql1);




    $or_sql1="SELECT * FROM pattern_order_master1 WHERE u_id='$or_u_id' AND pro_id='$or_pro_id'";
    $or_result1=mysqli_query($conn,$or_sql1);
 
    if($or_result1){
   while($orrows=mysqli_fetch_assoc($or_result1)){
   $or_pat_id=$orrows['pat_id'];
    // echo $or_pat_id."<br>";
  
   $sql7="INSERT INTO order_pattern1 (pro_id,u_id,pat_id) VALUES('$or_pro_id','$or_u_id','$or_pat_id')";
  $result7=mysqli_query($conn,$sql7);
  if($result7){


     echo "<script>location.href='choosemeasuretype.php';</script>";
  }
  
  else
  {
    echo "order not save";
  }
  }}
}

else{
  echo "not enter in order";
}
  }

}
 
}
 
}
?>




<!--------------javascript are here---------------------------------------------------------->

<script type="text/javascript">
  
  $(document).ready(function(){

    $(".changeqty").on('change',function(){

      var updateid=find(".updateid").val();
      var updateqty=find(".updateqty").val();
      console.log(updateqty);
      $.ajax({
            url='cart.php',
            method:'POST',
            cache:'false',
            data:{
              updateid:updateid,
              updateqty:updateqty
            },
            success:function(response){
              
              console.log(response);
            }
      });


    });

    $('#ordersave').click(function(){
      $('#continue').load('checkout.php');

    });

  });

</script>





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
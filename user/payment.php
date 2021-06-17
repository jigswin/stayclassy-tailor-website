<?php

include "header.php";
include "stayclassydb.php";

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

    <title>www.thestayclassy.com</title>
    <style type="text/css">
      .payment-cont{
        position: relative;
        top: 3rem;
        left:20%;
  
      }
      @media (max-width: 767px){
        .payment-cont{
          left: 0;
        }
      }
    </style>
    
  </head>
  <body>
    <div id="innerdrop">
    <div id="innerdrop1"><center>PAYMENT</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Checkout</center></div>
   </div>
    
<div class="container payment-cont">
  <div class="row">

<div class="col-md-8 order-md-2 mb-4 mt-5">
  <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted" style="font-size: 2.7rem">Your cart</span>
 -->            <?php
                 $totalqty=0;
                $cartfetch="SELECT * FROM product_master JOIN order_master1 ON product_master.pro_id=order_master1.pro_id WHERE u_id='$userid'";
                $resultfetch=mysqli_query($conn,$cartfetch);
                if(mysqli_num_rows($resultfetch)>0){
                  while($rows=mysqli_fetch_assoc($resultfetch)){
                    
                    $qty=$rows['qty'];
                    $totalqty=$totalqty+$qty;

          }}
          ?>
             <input type="hidden" name="totalqty" value="<?php echo $totalqty; ?>">    
           <!--  <span class="badge badge-secondary badge-pill" ><?php echo $totalqty;?>
            </span> -->
            
          <!-- </h4> -->
          <div class="row">
            <div class="col-md-10">
              <ul class="list-group mb-3">
                 <?php
                 $grandtotal=0;
                $cartfetch="SELECT * FROM product_master JOIN order_master1 ON product_master.pro_id=order_master1.pro_id WHERE u_id='$userid'";
                $resultfetch=mysqli_query($conn,$cartfetch);
                if(mysqli_num_rows($resultfetch)>0){
                  while($rows=mysqli_fetch_assoc($resultfetch)){
                    $sub_total1=$rows['sub_total'];
                    $totalqty=$rows['qty'];
                    $product_id=$rows['pro_id'];
                    $totalproduct_qty=$rows['pro_qty'];
                    ?>
                    <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                    <input type="hidden" name="totalproduct_qty" value="<?php echo $totalproduct_qty;?>">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h2 class="my-0" style="font-size: 2rem"><?php echo $rows['pro_name']?></h2>
                <small class="text-muted" style="font-size: 1.6rem">Quntity : <?php echo $rows['qty']?> </small>
              </div>
              <span class="text-muted" style="font-size: 2rem;"><?php echo $rows['sub_total']?></span>
              
            </li>
          
              <?php
              $grandtotal=$grandtotal+$sub_total1;

                  }
                }
                $tax=0;
                $tax=$grandtotal*18/100;
                $doublegrand=$tax+$grandtotal;
                //echo $grandtotal;
                ?>
                </ul>
                 <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h2 class="my-0" style="font-size: 2rem">Amount : </h2>
               
              </div>
              <span class="text-muted" style="font-size: 2rem;"><?php echo $grandtotal; ?></span>
              
            </li>
             <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h2 class="my-0" style="font-size: 2rem">All Taxes Included : </h2>
               
              </div>
              <span class="text-muted" style="font-size: 2rem;"> <?php echo $tax; ?></span>
              
            </li>
          
              
                <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h1 class="my-0 " style="font-size:2.5rem">Total Amount : </h1>
              </div>
               <span class="text-muted"><h1 style="font-size: 2.5rem;color: black"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $doublegrand;?></h1></span>
            </li>
            <input type="hidden" name="grandtotal" value="<?php echo $doublegrand; ?>">
           
       
         
           <?php

           $sqlorder="SELECT c_id FROM checkout1 WHERE u_id='$userid'";
           $resuorder=mysqli_query($conn,$sqlorder);
           
           if(mysqli_num_rows($resuorder)>0){
           while($c_id=mysqli_fetch_assoc($resuorder)){
            $o_id=$c_id['c_id'];
         }}
        
           ?>

           <form action="pgRedirect.php" method="POST">
            <?php 
            $ooo="ORDS" . rand(10000,99999999);
            $orderu_id=$ooo.'_'.$userid.'_'.$o_id;
            ?>
            <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
            name="ORDER_ID" autocomplete="off"
            value="<?php echo $orderu_id; ?>">
          
          <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $userid; ?>"></td>
      
          <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off"      
value="Retail">
          <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
            size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
          
         <input type="hidden" title="TXN_AMOUNT" tabindex="10"
            type="text" name="TXN_AMOUNT"
            value="<?php echo $doublegrand; ?>">
         
          
          <button class="btn btn-primary btn-lg btn-block p-2 mt-4" type="submit" style="font-size: 2rem" name="placeorder" value="CheckOut">Pay</button>
        </form>
          
 </div>

</div>
</div>
</div>
</div>


<br>
<br><br><br>

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
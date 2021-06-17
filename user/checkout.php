<?php

include "header.php";
include "stayclassydb.php";

// header("Pragma: no-cache");
// header("Cache-Control: no-cache");
// header("Expires: 0");

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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="stay.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>www.thestayclassy.com</title>
    <style type="text/css">
    #bodysize{
      font-size: 2rem;
    }
    #bodysize input{
      font-size: 2rem;
      padding: 2rem;
    }
     #bodysize option,select{
      font-size: 2rem;
    }
    #stateselect select{
      font-size: 2rem;

    }
    #radioid label{
      font-size: 1.6rem;
      margin-top: -1rem;
      position: relative;
     
    }
    #radioid input{
     
      
     
    }


      .container {
  max-width: 960px;
}


.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }
.border-top-gray { border-top-color: #adb5bd; }

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

.lh-condensed { line-height: 1.25; }
    </style>
  </head>

<div id="innerdrop">
    <div id="innerdrop1"><center>CHECKOUT</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Checkout</center></div>
   </div>
<BR><BR>
<body class="bg-light" >

    <div class="container mt-5">
      

      <div class="row" id="bodysize">
       
        <div class="col-md-8 order-md-1">
          <h1 class="mb-3">Billing address</h1>
          <form action="" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3 form-group">

                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter your name"  name="f_name">
              </div>
              <div class="col-md-6 mb-3 form-group">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="l_name" placeholder="" value="">
                
              </div>
            </div>
            <div class="mb-3 form-group">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" name='email'>
              
            </div>

            <div class="mb-3 form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="add1">
             
            </div>

            <div class="mb-3 form-group">
              <label for="address2">Address 2 </span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" name="add2">
              
            </div>
            <div class="mb-3 form-group">
              <label for="mobile">Mobile no.</label>
              <input type="number" class="form-control" id="mobile" placeholder="1234567890"  name="mobile">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3 form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" value="Ahmedabad" name="city">
              </div>
              <div class="col-md-4 mb-3 form-group" id="stateselect">
                <label for="state">State</label>
               <input type="text" class="form-control" id="state" value="Gujarat" name="state">
              </div>
              <div class="col-md-3 mb-3 form-group">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" name="zip" >
               
              </div>
              <input type="hidden" name="order_status" value="Processing Order">
               <input type="hidden" name="return_money" value="No Return">
            </div>
            
            <!-- <div class="form-group form-check" id="checkbtn">

              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checked" value="checked">
              <label class="form-check-label" for="exampleCheck1">Shipping address is the same as my billing address</label>
              </div> -->
          
            
            <!-- <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div> -->
            <hr class="mb-4">

            
          
            
         
        



 <!-------------------------------------------------------order show start here--------------------------------------------->       
<!-- <div class="col-md-4 order-md-2 mb-4 mt-5">
  <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted" style="font-size: 2.7rem">Your cart</span> -->
            <?php
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
            <!-- <span class="badge badge-secondary badge-pill " style="font-size: 2.2rem;margin-right: 8rem;"><?php echo $totalqty;?></span>
            
          </h4>
          <div class="row">
            <div class="col-md-10">
              <ul class="list-group mb-3"> -->
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
            <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h2 class="my-0"><?php echo $rows['pro_name']?></h2>
                <small class="text-muted">Quntity : <?php echo $rows['qty']?> </small>
              </div>
              <span class="text-muted"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows['sub_total']?></span>
              
            </li> -->
          
              <?php
              $grandtotal=$grandtotal+$sub_total1;

                  }
                }
                
                //echo $grandtotal;
                ?>
          <!-- </ul>
              
                <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h1 class="my-0 ">Total : </h1>
              </div>
               <span class="text-muted"><h1><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $grandtotal;?><h1></span>
            </li> -->
            <input type="hidden" name="grandtotal" value="<?php echo $grandtotal; ?>">
           
       
        
         <button class="btn btn-primary btn-lg btn-block p-2 mt-4" type="submit" style="font-size: 2rem" name="placeorder" value="CheckOut">Confirm Order</button>
         </form>
           <!--  </div>
          </div>-->
</div>
</div> 

<!--------------------------------payment form--------------------------------->



<!-------------------------------------------------------row end here-------------------------------------------------------->
      </div>
 <!------------------------------------------------------container end here-------------------------------------------->     
    </div>
<br>
<br>
<br>
<br>


<!--------------------checkout process here------------------------------------------->

<?php
if(isset($_POST['placeorder'])){
  $totalqty=$_POST['totalqty'];
  $grandtotal=$_POST['grandtotal'];
  $allgst=$grandtotal*18/100;
  $doublegrantotal=$allgst+$grandtotal;
  $product_id=$_POST['product_id'];
  $totalproduct_qty=$_POST['totalproduct_qty'];
  // echo $userid;
  // echo $totalqty;
  // echo $grandtotal;
  if(($_POST['f_name']=="") || ($_POST['l_name']=="") || ($_POST['email']=="")|| ($_POST['add1']=="") || ($_POST['add2']=="") || ($_POST['mobile']=="") || ($_POST['zip']==""))
  {
    $checkout="all fields are required";
  }
  else
  {
  //   $sql9="SELECT u_id FROM checkout1 WHERE u_id='$userid'";
  // $result9=mysqli_query($conn,$sql9);
  // if(mysqli_num_rows($result9)>0){
  //     echo "<script>alert('order already placed')</script>";
  //       echo "<script>location.href='orderplace.php';</script>";

  // }
  // else
  // {
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $email=$_POST['email'];
    $add1=$_POST['add1'];
    $add2=$_POST['add2'];
    $mobile=$_POST['mobile'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $pay_status="Pending";
    $order_status=$_POST['order_status'];
    $return_money=$_POST['return_money'];
    // echo $f_name."<br>";
    // echo $l_name."<br>";
    // echo $email."<br>";
    // echo $add1."<br>";
    // echo $add2."<br>";
    // echo $mobile."<br>";
    // echo $city."<br>";
    // echo $state."<br>";
    // echo $zip."<br>";

    $sqlcheck="INSERT INTO checkout1 (u_id,c_f_name,c_l_name,c_email,c_add,c_add2,c_mobile,c_city,c_state,c_zip,c_qty,c_total,c_allgst,c_grandtotal,pay_status,order_status,return_money) VALUES ('$userid','$f_name','$l_name','$email','$add1','$add2','$mobile','$city','$state','$zip','$totalqty','$grandtotal','$allgst','$doublegrantotal','$pay_status','$order_status','$return_money')";
    $resultcheck=mysqli_query($conn,$sqlcheck);
     if($resultcheck)
    {
       // echo "<script>location.href='payment.php'</script>";
      }
    else
    {
     $checkout="data not inserted";
    }
//------------------------------------checkout's c_id  detail fetch here--------------------------------------
    $checksql="SELECT c_id FROM checkout1 WHERE u_id='$userid'";
    $checkresult=mysqli_query($conn,$checksql);
    if(mysqli_num_rows($checkresult)>0){
      while($checkrow=mysqli_fetch_assoc($checkresult)){
        $c_id=$checkrow['c_id'];
      }
    }

//------------------------------------order master 2 detail insert here--------------------------------------

    $sqlorder="SELECT * FROM order_master1 WHERE u_id='$userid'";
    $resultorder=mysqli_query($conn,$sqlorder);
    if(mysqli_num_rows($resultorder)>0){
      while($rowsorder=mysqli_fetch_assoc($resultorder)){
        $or_u_id=$rowsorder['u_id'];
        $or_pro_id=$rowsorder['pro_id'];
        $or_qty=$rowsorder['qty'];
        $or_pro_price=$rowsorder['pro_price'];
        $finalsub_total=$rowsorder['sub_total'];
       
         $sql61="INSERT INTO order_master2 (u_id,pro_id,qty,pro_price,sub_total,c_id) VALUES('$or_u_id','$or_pro_id','$or_qty','$or_pro_price','$finalsub_total','$c_id') ";
        $result61=mysqli_query($conn,$sql61);
         }
    }
        if($result61){

          //---------------------order pattern 2 detail insert here--------------------------------------

        $sqlpattern="SELECT * FROM order_pattern1 WHERE u_id='$userid'";
        $resultpattern=mysqli_query($conn,$sqlpattern);
        if(mysqli_num_rows($resultpattern)>0){
       while($rowspattern=mysqli_fetch_assoc($resultpattern)){
        $or_u_id1=$rowspattern['u_id'];
        $or_pro_id1=$rowspattern['pro_id'];
        $or_pat_id1=$rowspattern['pat_id'];
        $sql71="INSERT INTO order_pattern2 (pro_id,u_id,pat_id,c_id) VALUES('$or_pro_id1','$or_u_id1','$or_pat_id1','$c_id')";
        $result71=mysqli_query($conn,$sql71);
         }
        }
        if($result71){
          }
        else{
          $checkout="order_pattern2 not inserted";
        }

         
      }
        else
        {
         $checkout="order master 2 not inserted";
        }

         
     
    
        
    

        //------------------------------------measuretype detail insert here--------------------------------------

        $sqlmeasure="SELECT * FROM measuretype WHERE u_id='$userid'";
        $resultmeasure=mysqli_query($conn,$sqlmeasure);
        if(mysqli_num_rows($resultmeasure)>0){
       while($rowsmeasure=mysqli_fetch_assoc($resultmeasure)){
        $measure_u_id=$rowsmeasure['u_id'];
        $measure_type=$rowsmeasure['measure_type'];
         }
      } 
       $sql1a1="INSERT INTO measuretype1 (u_id,measure_type,c_id) VALUES('$measure_u_id','$measure_type','$c_id') ";
        $result1a1=mysqli_query($conn,$sql1a1); 
        if($result1a1){
           
          $sqlmeasuretype="SELECT * FROM measuretype1 WHERE u_id='$userid'";
          $resultmeasuretype=mysqli_query($conn,$sqlmeasuretype);
          if(mysqli_num_rows($resultmeasuretype)>0){
            while($rowsmeasuretype=mysqli_fetch_assoc($resultmeasuretype)){
              $measuretype=$rowsmeasuretype['measure_type'];
            }
          }
   //------------------------------------appointment 1 detail insert here--------------------------------------
        if($measure_type=='appointment'){
        $sqlappoint="SELECT * FROM appointment WHERE u_id='$userid'";
        $resultappoint=mysqli_query($conn,$sqlappoint);
        if(mysqli_num_rows($resultappoint)>0){
       while($rowsappoint=mysqli_fetch_assoc($resultappoint)){
        $pattern_u_id=$rowsappoint['u_id'];
        $aname=$rowsappoint['name'];
        $add1=$rowsappoint['address'];
        $add2=$rowsappoint['address_2'];
        $acity=$rowsappoint['city'];
        $astate=$rowsappoint['state'];
        $azip=$rowsappoint['zip'];
        $aemail=$rowsappoint['email'];
        $amobile=$rowsappoint['a_mobile'];
        $adate=$rowsappoint['a_date'];
        $atime=$rowsappoint['a_time'];
        $atotime=$rowsappoint['to_time'];
        $appoint_status='Pending';
         }
      }

          $sqlappoint1="INSERT INTO appointment1 (u_id, name, address, address_2, city, state, zip, email, a_mobile, a_date, a_time, to_time,status,c_id) VALUES ('$pattern_u_id','$aname','$add1','$add2','$acity','$astate','$azip','$aemail','$amobile','$adate','$atime','$atotime','$appoint_status','$c_id')";
          $resultappoint1=mysqli_query($conn,$sqlappoint1);
          if($resultappoint1)
          {
            echo "<script>alert('Your order is confirm')</script>";
            echo "<script>location.href='payment.php'</script>";
          }
          else
          {
           $checkout="not inserted appointment";
          }
          
}
else
{
       //------------------------------------self measurement 3 detail insert here--------------------------------------
           
        $sqlself="SELECT * FROM self_measurement1 WHERE u_id='$userid'";
        $resultself=mysqli_query($conn,$sqlself);
        if(mysqli_num_rows($resultself)>0){
       while($rowself=mysqli_fetch_assoc($resultself)){
        $self_u_id=$rowself['u_id'];
        $s_collar=$rowself['s_collar'];
        $s_chest=$rowself['s_chest'];
        $s_sleeve_length=$rowself['s_sleeve_length'];
        $s_shoulder_length=$rowself['s_shoulder_length'];
        $s_cuff=$rowself['s_cuff'];
        $s_waist=$rowself['s_waist'];
        $s_shirt_length=$rowself['s_shirt_length'];
        $s_neck=$rowself['s_neck'];
        $t_ankle=$rowself['t_ankle'];
        $t_seat=$rowself['t_seat'];
        $t_hip=$rowself['t_hip'];
        $t_langot=$rowself['t_langot'];
        $t_zip=$rowself['t_zip_size'];
        $t_thai=$rowself['t_thai'];
        $t_length=$rowself['t_pent_length'];
       
           }
    }
        $sqlall1="INSERT INTO self_measurement3 (u_id,s_collar,s_chest,s_sleeve_length,s_shoulder_length,s_cuff,s_waist,s_shirt_length,s_neck,t_ankle,t_seat,t_hip,t_langot,t_zip_size,t_thai,t_pent_length,c_id) VALUES('$self_u_id','$s_collar','$s_chest','$s_sleeve_length','$s_shoulder_length','$s_cuff','$s_waist','$s_shirt_length','$s_neck','$t_ankle','$t_seat','$t_hip','$t_langot','$t_zip','$t_thai','$t_length','$c_id')";
         $resultall1=mysqli_query($conn,$sqlall1);
          if($resultall1)
          {
            echo "<script>alert('Your order data is saved successfully.')</script>";
            echo "<script>location.href='payment.php'</script>";
          }
          else
          {
           $checkout="not inserted self_measurement";
          }
         
       }  
    }
        else{
         $checkout="not insert in measuretype";
        }
         
                                               
         


      

   
    

   
    
  
  }
}


?>
<div class="container" style="margin-top: -9rem;margin-bottom: 7rem">
<div class="row">
  <div class="col-md-8">
<?php
if(isset($checkout)){
  echo "<div class='' style='background-color:orange;color:white;padding:.5rem;text-align:center;font-size:2rem;border:.1rem solid black;margin-top:5rem' >".$checkout."</div>";
}

?>
</div>
</div>
</div>



<?php
 include "footer.php";
?>


   <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>



  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
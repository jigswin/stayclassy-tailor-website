<?php
include "stayclassydb.php";
if(isset($_GET['order_id'])){
  $c_id=$_GET['order_id'];
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
    <div class="container" style="margin-top: 8rem;margin-left: 28rem;">
      <h1 style="top: -4rem;left: 7rem;position: relative;"><u>CANCLE ORDER</u></h1>
      <div class="row">
        <div class="col-md-6" style="border:.1rem solid black;padding: 4rem;background-color:lightgrey">
   <form action="" method="POST">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Order Id : </label>
    <div class="col-sm-8">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $c_id; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Reason : </label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="inputPassword" Required></textarea> 
    </div>
  </div>
  <button class="btn btn-success mt-3" type="submit" name="cancleorder">CANCLE ORDER</button>
</form>
</div>
</div>
</div>


<?php

if(isset($_POST['cancleorder'])){

    $sqlcancle3="SELECT * FROM product_master JOIN order_master2 ON product_master.pro_id=order_master2.pro_id WHERE c_id='$c_id'";
    $resultcancle3=mysqli_query($conn,$sqlcancle3);
    if(mysqli_num_rows($resultcancle3)>0){
      while($Cancelerows=mysqli_fetch_assoc($resultcancle3)){
        $totalproduct=$Cancelerows['pro_qty'];
        $pro_id_cancle=$Cancelerows['pro_id'];
        $orderqty=$Cancelerows['qty'];
        $cancleproduct=$totalproduct+$orderqty;
        $updatesql4="UPDATE product_master SET pro_qty='$cancleproduct' WHERE pro_id='$pro_id_cancle'";
        $updateresult4=mysqli_query($conn,$updatesql4);
        if($updateresult4){
          $updatesql5="UPDATE checkout1 SET order_status='Canceled' WHERE c_id='$c_id'";
          $updateresult5=mysqli_query($conn,$updatesql5);
          if($updateresult5){
            echo "<script>alert('order cancel successfully')</script>";
            echo "<script>location.href='order_history.php'</script>";

          }
          else
          {
            echo "something went wrong";
          }
        }
        else
        {
          echo "product not added";
        }
      }
    }

}


?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


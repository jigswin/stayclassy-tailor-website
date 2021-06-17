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
 


 

<!---------------------------------profile php end here--------------------------------------->
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
  </head>
  <body>
   
   

     
   <div id="innerdrop">
    <div id="innerdrop1"><center>ORDER HISTORY</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Order History</center></div>
   </div>
   
<br>
<br>
<br>
<br>

   
     
<div class="container" style="margin-top: 5rem;">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
       
           
          <div class="card-body">
             <table class="table table-bordered" style="font-size: 2rem">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">NO.</th>
                      
                      <th scope="col">QUNTITY</th>
                      <th scope="col">TOTAL</th>
                      <th scope="col">PAY STATUS</th>
                      <th scope="col">DATE</th>
                      <th scope="col">ACTION</th>
                      <th scope="col">ORDER</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $cnt=0;

                    $sql="SELECT * FROM checkout1 WHERE u_id='$userid'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                      while($rows=mysqli_fetch_assoc($result)){
                        $cnt=$cnt+1;
                        $c_id=$rows['c_id'];
                        ?>


                    <tr>
                      <td scope="col"><?php echo $cnt;?>.</td>
                      <!-- <td scope="col"><?php echo $rows['c_id'];?></td> -->
                      <td scope="col"><?php echo $rows['c_qty'];?></td>
                      <td><?php echo $rows['c_grandtotal'];?></td>
                      <td><?php echo $rows['pay_status'];?></td>
                      <td><?php echo $rows['c_date'];?></td>
                      <form action="order_track.php" method="POST">
                        <input type="hidden" name="c_id" value="<?php echo $rows['c_id'];?>">
                      <td><button class="" type="submit" style="font-size: 2rem;padding-left: 2rem;padding-right: 2rem;background-color: white;border:none;margin-left: 3rem;color: purple;text-decoration: underline;" name="track_btn">Track</button></td>
                    </form>
                    
                      <td>
                        <form action="order_history.php" method="POST">
                        <input type="hidden" name="c_id_cancle" value="<?php echo $c_id;?>">
                      <button type="submit" name="cancleorder" class="btn btn-danger" style="font-size: 1.5rem;border-radius: 50%;margin-left: 3rem"><center><i class="fa fa-times" aria-hidden="true"></i></center></button> 
                    </form>
                  </td>
                    </tr>
                     <?php
                      }
                    }

                    ?>

                    
                  </tbody>
                </table>
          </div>
 

      
 </div>
 </div>     
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php

if(isset($_POST['cancleorder'])){
  $c_id_cancle=$_POST['c_id_cancle'];
  $sqlcancle="SELECT * FROM checkout1 WHERE c_id='$c_id_cancle'";
  $resultcancle=mysqli_query($conn,$sqlcancle);
  if(mysqli_num_rows($resultcancle)>0){
    while($rowscancle=mysqli_fetch_assoc($resultcancle)){
      $order_status=$rowscancle['order_status'];

    }
  }
  $sqlcancle1="SELECT * FROM appointment1 WHERE c_id='$c_id_cancle'";
  $resultcancle1=mysqli_query($conn,$sqlcancle1);
  if(mysqli_num_rows($resultcancle1)>0){
    while($rowscancle1=mysqli_fetch_assoc($resultcancle1)){
      $appoint_status=$rowscancle1['status'];

    }
  }


  if($order_status=='Canceled')
  {
    echo "<script>alert('order already cancle')</script>";
  }
  elseif ($order_status=='Shipped')
  {
    echo "<script>alert('Order not cancle because your order already Shipped')</script>";
  }
  elseif ($order_status=='Delivered')
  {
    echo "<script>alert('Order not cancle because your order already Delivered')</script>";
  }
  elseif ($appoint_status=='Success')
  {
    echo "<script>alert('Order not cancle because your appointment already recieved and your work in progress')</script>";
  }
  elseif ($order_status=='Processing Order')
  {
    echo "<script>location.href='order_cancle.php?order_id=$c_id_cancle'</script>";

    

  }
  else
  {
    echo "something went wrong";
  }


}

?>



   <!-------- footer start here------------------------------------------------>
    <?php
   //include "footer.php";
   ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
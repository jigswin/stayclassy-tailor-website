<?php

include "header.php";

$all=$_POST['allfilter'];
$shirt=$_POST['allshirt'];
$trouser=$_POST['alltrouser'];
$lowprice=$_POST['alllowprice'];
$highprice=$_POST['allhighprice'];

if(isset($all)){

	echo ' $sql1="SELECT * from product_master order by pro_id desc LIMIT {$offset},{$limit}";
                     $result1=mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($result1)>0){
                while($rows1=mysqli_fetch_array($result1)){

                  $pro_name=$rows1["pro_name"];
                  $pro_price=$rows1["pro_price"];
                  $images=$rows1["pro_image"];
                  $pro_id1=$rows1["pro_id"];
                  $productlessqty=$rows1["pro_qty"];


                   <div id="1" class="item new col-md-3 card-product" style="transition: transform 0.5s;">
                <div class="featured-item">
                  <a href="singleproduct.php?pro_id='.$rows1[pro_id].'"><?php echo '<img  style="height:30rem" src="../stayclassy_admin/upload/'.$rows1['pro_image'].'">'; ?> 
                </a>
                  <h4 style="color:black"><?php echo $rows1['pro_name']; ?></h4>
                  <h6 style="color:black"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows1['pro_price']; ?></h6>
                </div>
                </div>

                  <?php
                }
              }';

}




?>
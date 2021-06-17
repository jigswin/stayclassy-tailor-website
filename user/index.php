
<?php
   include "header.php";
// if(isset($_GET['u_id'])){
//   $u_id=$_GET['u_id'];

//   if($u_id){
//    }
//   else{
//     // echo "<script> location.href='login.php';</script>";
//     exit;
//   }
// }


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  echo "<script> location.href='login.php';</script>";
  exit;
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
      <link rel="stylesheet" type="text/css" href="css\singleproduct.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>www.thestayclassy.com</title>
    <style type="text/css">
      #homeslider1{
        width: 100%;
        height: 60rem;
      }
    @media (max-width: 500px){
        #homeslider1{
          height: 25rem;
        }
      }



      /* CUSTOMIZE THE CAROUSEL
-------------------------------------------------- */

/* Carousel base class */
.carousel {
  margin-bottom: 4rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height:70rem;
  background-color: #777;
}
.carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 70rem;
}


/* MARKETING CONTENT
-------------------------------------------------- */

/* Center align the text within the three columns below the carousel */
.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
.marketing h2 {
  font-weight: 400;
}
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}


/* Featurettes
------------------------- */

.featurette-divider {
  margin: 5rem 0; /* Space out the Bootstrap <hr> more */
}

/* Thin out the marketing headings */
.featurette-heading {
  font-weight: 300;
  line-height: 1;
  letter-spacing: -.05rem;
}
#hovercate1{
  transition: transform 0.4s;

}
#hovercate1:hover{
  /*transform: translateX(-.5rem);*/
  transform: translateY(-.5rem);
}
#hovercate{
  transition: transform 0.8s;

}
#hovercate:hover{
  transform: translateY(-.5rem);
}
#pentcate{
 position: relative;top: 50%;left:35%;font-size: 7rem;color: white;font-weight: bolder;
}
#shirtcate{
 position: relative;top: 50%;left:35%;font-size: 7rem;color: white;font-weight: bolder;
}

/* RESPONSIVE CSS
-------------------------------------------------- */

@media (min-width: 40em) {
  /* Bump up size of carousel content */
  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }

  .featurette-heading {
    font-size: 50px;
  }
}

@media (min-width: 62em) {
  .featurette-heading {
    margin-top: 7rem;
  }
}

@media (max-width: 500px){
  #pentcate{
    font-size: 4rem;
  }
  #shirtcate{
    font-size: 4rem;
  }
}




    </style>
  </head>
  <body>
     <!-- header start here-------------------------------------->
   

    <!--img slider start here -->
      <div id="sline"></div>

          <!-- <div>
          <div id="homeslider" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators">
              <li data-target="#homeslider" data-slide-to="0" class="active"></li>
              <li data-target="#homeslider" data-slide-to="1" ></li>
              <li data-target="#homeslider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                 <img src="image\ban.jpg" id="homeslider1">
                </div>
                <div class="carousel-item">
               <img src="image\banner.png" id="homeslider1">
                </div>
                <div class="carousel-item">
               <img src="image\contactimage3.jpg.jpg" id="homeslider1">
                </div>
          </div> 
          <a class="carousel-control-prev" href="#homeslider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#homeslider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </div> -->







    
    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="image\home4.jpg" alt="First slide">
            <!-- <div class="container">
              <div class="carousel-caption text-left">
                <h1>Example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div> -->
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="image\home3.jpg" alt="Second slide">
            <!-- <div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div> -->
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="image\home2.jpg " alt="Third slide">
            <!-- <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div> -->
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>








<!------------------------------------ category ---------------------------------->
<div class="container-fluid" style="margin-bottom:8rem">
  <div style="margin-top: 10rem;margin-bottom: -4rem">
            <div class="featured">FEATURED CATEGORY</div>
            <div ><center><span id="linex1" style="color: grey">_____</span><span id="cross" style="color: grey">x</span><span id="linex2" style="color: grey;">_____</span></center></div>
          </div>
  <div class="container">
 

    <div class="row">

      <div class="col-md-6" style="padding: 2rem;padding-right: 2rem;padding-left: 2rem">
        <a href="allshirt.php" ><h1 id="shirtcate">SHIRT</h1><img id="hovercate" src="image\shirt cate1.jpg" width="100%" style="height:40rem">

        </a>
      </div>
      <div class="col-md-6" style="padding: 2rem;padding-right: 2rem;padding-left: 2rem">
          <a href="alltrouser.php" ><h1 id="pentcate">PENT</h1><img id="hovercate1" src="image\pent cate3.jpg" width="100%" style="height:40rem">
            
          </a>
      </div>
    </div>
  </div>

</div>







      
<!------------------------------------------------------------------------------------------------------------------------->






<div class="container-fluid" style="background-image: linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%);padding-top: 8rem;padding-bottom: 8rem;box-sizing: border-box;margin-top:rem">
      <!-- featured product start here-->
        <div style="margin-top: 8rem;margin-bottom: 6rem;">
            <div class="featured">FEATURED PRODUCT</div>
            <div ><center><span id="linex1" style="color: black">_____</span><span id="cross" style="color: black">x</span><span id="linex2" style="color: black;">_____</span></center></div>
          </div>

      <!-- product slider start here-->
<br>
<br>

<!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           
            <div class="owl-carousel owl-theme">
               <?php 
              require 'stayclassydb.php';
              $sql1="SELECT * FROM product_master ORDER BY pro_id asc LIMIT 0,8";
              $result1=mysqli_query($conn,$sql1);
              if(mysqli_num_rows($result1)>0){
                while($rows1=mysqli_fetch_assoc($result1)){
              ?>
                <div class="featured-item" style="background-color:rgb(255, 251, 246)">
                   <a href="singleproduct.php?pro_id=<?php echo $rows1['pro_id'];?>"><?php echo '<img style="height:30rem" src="../stayclassy_admin/upload/'.$rows1['pro_image'].'" width="100%">'; ?> 
                   </a>
                  <h4 style="color:black"><?php echo $rows1['pro_name']; ?></h4>
                  <h6 style="color:black"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows1['pro_price']; ?></h6>
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
    </div>
    <!-- Featred Ends Here -->  

<div class="container-fluid" style="padding-top: 8rem;padding-bottom: 8rem;box-sizing: border-box;"><!-- #eef0ff -->
      <!-- featured product start here-->
            <div style="margin-top: 8rem;margin-bottom: 6rem">
            <div class="featured" style="color:black;">LETEST PRODUCT</div>
            <div><center><span id="linex1">_____</span><span id="cross">x</span><span id="linex2">_____</span></center></div>
          </div>

      <!-- product slider start here-->
<br>
<br>

<!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           
            <div class="owl-carousel owl-theme">
               <?php 
              require 'stayclassydb.php';
              $sql1="SELECT * FROM product_master ORDER BY pro_id desc LIMIT 0,8";
              $result1=mysqli_query($conn,$sql1);
              if(mysqli_num_rows($result1)>0){
                while($rows1=mysqli_fetch_assoc($result1)){
              ?>
                <div class="featured-item" style="background-color: white">
                   <a href="singleproduct.php?pro_id=<?php echo $rows1['pro_id'];?>"><?php echo '<img style="height:30rem" src="../stayclassy_admin/upload/'.$rows1['pro_image'].'" width="100%">'; ?> 
                   </a>
                  <h4 style="color:black"><?php echo $rows1['pro_name']; ?></h4>
                  <h6 style="color:black"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $rows1['pro_price']; ?></h6>
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
    </div>
    <!-- Featred Ends Here -->  






   







<!-------------------------------------------carouserl using ----------------------------------------->


<!-- <main role="main" style="background-color:;padding:4rem;padding-bottom: 14rem;padding-top:14rem;"> -->
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <!-- <div class="container marketing"> -->

        <!-- Three columns of text below the carousel -->
        <!-- <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="250" height="250">
            <h1 style="font-size: 3rem;margin-top: 2rem; color: black">Heading</h1>
            <p style="font-size: 2rem;margin-top: 2rem;margin-bottom: 2rem;color:  black">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
           <p style="font-size: 2rem;margin-top: 2rem;margin-bottom: 4rem"><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div> --><!-- /.col-lg-4 -->
          <!-- <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="250" height="250">
            <h1 style="font-size: 3rem;margin-top: 2rem;color:  black">Heading</h1>
            <p style="font-size: 2rem;margin-top: 2rem;margin-bottom: 2rem;color:  black">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p style="font-size: 2rem;margin-top: 2rem;margin-bottom: 4rem"><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div> --><!-- /.col-lg-4 -->
         <!--  <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="250" height="250">
             <h1 style="font-size: 3rem;margin-top: 2rem;color:  black">Heading</h1>
            <p style="font-size: 2rem;margin-top: 2rem;margin-bottom: 2rem;color:  black">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p style="font-size: 2rem;margin-top: 2rem;margin-bottom: 4rem"><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div> --><!-- /.col-lg-4 -->
       <!--  </div> --><!-- /.row -->


        
      <!-- </div> --><!-- /.container -->
<!-- </main> -->



<!---------------------------------------carousel end here-------------------------------------------->


<!-- <br><br><br><br><br><br>

<br><br><br><br><hr style="height: .2rem"><br><br> -->


        <!-- icon of services start here-->
    <div style="background-image: radial-gradient(73% 147%, #EADFDF 59%, #ECE2DF 100%), radial-gradient(91% 146%, rgba(255,255,255,0.50) 47%, rgba(0,0,0,0.50) 100%);
 background-blend-mode: screen;padding-top: 8rem;padding-bottom: 8rem;" id="icon" >

      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-sm-4 col-6"><center><i class="fa fa-shirtsinbulk" aria-hidden="true" id="icon3"></i></center><div class="icon2"><center>Satisfied Product</center></div></div>
          <div class="col-lg-2 col-sm-4 col-6"><center><i class="fa fa-headphones" aria-hidden="true" id="icon3"></i></center><div class="icon2"><center>24 X 7 Support</center></div></div>
          <div class="col-lg-2 col-sm-4 col-6"><center><i class="fa fa-exchange" aria-hidden="true" id="icon3"></i></center><div class="icon2"><center>Secure Checkout</center></div></div>
          <div class="col-lg-2 col-sm-4 col-6"><center><i class="fa fa-credit-card-alt" aria-hidden="true" id="icon3"></i></center><div class="icon2"><center>Free Consult</center></div></div>
          <div class="col-lg-2 col-sm-4 col-6"><center><i class="fa fa-truck" aria-hidden="true" id="icon3"></i></center><div class="icon2"><center>Free Consult</center></div></div>
          <div class="col-lg-2 col-sm-4 col-6"><center><i class="fa fa-comment" aria-hidden="true" id="icon3"></i></center><div class="icon2"><center>Free Consult</center></div></div>
        </div>
      </div>
    </div>

<!-- <br><br><hr style="height:.3rem"> <br><br><br><br>
<br><br><br><br><br><br> -->

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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stay.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>www.thestayclassy.com</title>
    
  </head>
  <body>
    
    <!-- header start here -->

    <?php
    include "header.php";
    ?>
    <!--img slider start here -->
      <div id="sline"></div>

          <div class="container-fluid" >
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                 <img src="image\slider1.jpg" class="img1" id="slider" alt="...">
                </div>
                <div class="carousel-item">
               <img src="image\slider4.jpg" class="img2" id="slider" alt="...">
                </div>
                <div class="carousel-item">
               <img src="image\sli2.jpg" class="img3" id="slider" alt="...">
                </div>
          </div> 
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </div>
      








<!------------------------------------------------------------------------------------------------------------------------->







      <!-- featured product start here-->
            <div class="featured">FEATURED PRODUCT</div>
            <div><center><span id="linex1">_____</span><span id="cross">x</span><span id="linex2">_____</span></center></div>


      <!-- product slider start here-->
          <div class="container" id="proset">
         <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
              <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\sli.jpg" class="d-block w-100" alt="..."></div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\sli.jpg" class="d-block w-100" alt="..."></div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\sli.jpg" class="d-block w-100" alt="..."></div>
            <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\sli.jpg" class="d-block w-100" alt="..."></div>
          </div>
        </div>
          <div class="carousel-item">
              <div class="row">
             <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\slider3.jpg" class="d-block w-100" alt="..."></div>
             <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\slider3.jpg" class="d-block w-100" alt="..."></div>
             <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\slider3.jpg" class="d-block w-100" alt="..."></div>
             <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\slider3.jpg" class="d-block w-100" alt="..."></div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\sli3.png" class="d-block w-100" alt="..."></div>
              <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\sli3.png" class="d-block w-100" alt="..."></div>
              <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\sli3.png" class="d-block w-100" alt="..."></div>
              <div class="col-xl-3 col-lg-3 col-sm-6 col-12"><img src="image\sli3.png" class="d-block w-100" alt="..."></div>
            </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
        </div>


        <!-- icon of services start here-->
    <div style="background-color: lightgrey" id="icon">
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
    
        <!--footer of website is start here-->

        <?php
          include "footer.php";
          ?>



           <script src="js\jquery-3.5.1.min.js"></script>
          
 
         <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->                                                               
  </body>
</html>                                                            
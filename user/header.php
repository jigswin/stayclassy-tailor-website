<?php
session_start();
if(isset($_POST['userlogout'])){
  session_unset();
  session_destroy();
  echo "<script>alert('You are logout Successfully..')</script>";
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
    <link rel="stylesheet" type="text/css" href="stay2.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

   

    <!-- Bootstrap core CSS -->
    <link href="design folder/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="design folder/assets/css/fontawesome.css">
    <link rel="stylesheet" href="design folder/assets/css/tooplate-main.css">
    <link rel="stylesheet" href="design folder/assets/css/owl.css">


<!------testimonial -------------------------------------------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">


    

    <title>www.thestayclassy.com</title>
    <style type="text/css">
      @media (max-width:991px )
      {
        #cartsup{
          font-size: 1.2rem;
          position: relative;
          top: -78%;
          left: 50%;
      }
    }
    </style>
    
  </head>
  <body>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">LOGOUT</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 2rem;">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 1.8rem;">
        Are you sure you want to logout ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 1.9rem;">Close</button>
        <form action="" method="POST">
        <button type="submit" class="btn btn-primary" style="font-size: 1.9rem;" name="userlogout">Logout</button>
      </form>
      </div>
    </div>
  </div>
</div>











 <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul>
  <li><a href="index.php">HOME</a></li>
  <li><a href="aboutus.php">ABOUT US</a></li>
<li><a href="shop.php" class="hovereffect">SHOP</a></li>
    
      <ul id="subdrop">
              <li><div> <a href="allshirt.php">SHIRT</a><i class="fa fa-plus" aria-hidden="true" id="plusbtn1"></i></div>
                 <ul id="subdrop1" >
                    <li><a href="">COTTON</a></li>
                    <li><a href="">COTTON2</a></li>
                    <li><a href="">COTTON3</a></li>
                    <li><a href="">COTTON4</a></li>
                  </ul>
              </li>
                <li><a href="alltrouser.php">TROUSER</a><i class="fa fa-plus" aria-hidden="true" id="plusbtn2"></i>
                   <ul id="subdrop1" style="display: none;">
                    <li><a href="">COTTON</a></li>
                    <li><a href="">KODROW</a></li>
                    <li><a href="">JEANS</a></li>
                    <li><a href="">CHINOSE</a></li>
                  </ul>

                </li>
                <li><a href="pattern.php" >PATTERN</a><i class="fa fa-plus" aria-hidden="true" id="plusbtn3"></i>

                   <ul id="subdrop1" style="display: none;">
                    <li><a href="">SHIRT</a></li>
                    <li><a href="">TROUSER</a></li>
                    
                  </ul>

                </li>
      </ul>
            
 
  <li><a href="contactus.php">CONTACT US</a></li>
  <li><a href="myaccount.php">MY ACCOUNT</a></li>
</ul>
</div>







    <!--logo start here-->

    <div class="Shipping">Free Shipping On All Orders.</div>


    <!--navigation bar starting here-->

    <div class="logo">
      <div class="stay">STAY CLASSY</div>

      <div class="choice">The Gentleman's Choice</div>
      <!-- <a class="btn btn-primary" href="register.php" role="button">Registration/Login</a>
 -->
        <ul class="navicon">
          <li id="search"><a href="searchpage.php"><i class="fa fa-search" aria-hidden="true"></i></a></li>
          <!-- <li><i class="fa fa-heart-o" id="heart"aria-hidden="true"></i></li> -->
          <li><a href="cart.php"><i class="fa fa-shopping-cart" id="cart" aria-hidden="true"></i><sup id="cartsup">
            (<?php if(isset($_SESSION['totalcount']))
            { 
              echo $_SESSION['totalcount'];
            }
            else
            {
              echo "0";
            }
            ?>)</sup></a></li>
           <li id="rs">
            <button  class="" data-toggle="modal" data-target="#exampleModal4" style="background-color: white;border:0rem solid white;">
            <i class="fa fa-power-off" aria-hidden="true"></i></button>
          </li> 
          <li id="menubar1"><i class="fa fa-bars" onclick="openNav()" aria-hidden="true"></i></li>
          








           <!--  <li class="nav-item dropdown no-arrow">
                            <a class="nav-link " href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="position: relative;margin-top: -.2rem">
                                jigsnagar
                                </span> -->
                                <!-- <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 2rem;position: relative;margin-top:-4rem;"></i>
                            </a> -->
                            <!-- Dropdown - User Information -->
                            <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown" style="font-size: 1.5rem">
                                <a class="dropdown-item" href=""> -->
                                    <!-- <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> -->
                                   <!--  Profile
                                </a>
                                <a class="dropdown-item" href="#"> -->
                                    <!-- <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> -->
                                   <!--  Settings
                                </a>
                                <a class="dropdown-item" href="#"> -->
                                    <!-- <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> -->
                                   <!--  Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> -->
                                    <!-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> -->
                                 <!--    Logout
                                </a>
                            </div>
                        </li>
 -->









          
        </ul>
      </div>


      <div class="menubar">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li id="abus"><a href="aboutus.php">ABOUT US</a></li>
          <li><a href="shop.php">SHOP</i></a>
            <!-- <div class="shop1">
                <ul>
                    <li class="hoverme"><a href="allshirt.php">SHIRT</a><i class="fa fa-caret-right" aria-hidden="true" id="shop2_1"></i>


                      <div class="shop2">
                       <ul>
                    <li><a href="">COTTON</a></li>
                    <li><a href="">COTTON2</a></li>
                    
                       </ul>
                    </div>
                    </li>
                    <li class="hoverme"><a href="alltrouser.php">TROUSER</a><i class="fa fa-caret-right" aria-hidden="true" id="shop2_1"></i>


                      <div class="shop2">
                       <ul>
                    <li><a href="">COTTON</a></li>
                    <li><a href="">KODROW</a></li>
                    
                       </ul>
                    </div>

                    </li>
                    <li class="hoverme"><a href="pattern.php">PATTERN</a><i class="fa fa-caret-right" aria-hidden="true" id="shop2_1"></i>
                      <div class="shop2">
                       <ul>
                    <li><a href="">SHIRT</a></li>
                    <li><a href="">TROUSER</a></li>
                    
                       </ul>
                    </div>

                    </li>
                    
                </ul>
              </div> -->
            </li>
            <li><a href="contactus.php" id="cous">CONTACT US</a></li>

          <!--   <li><a href="#">INQUIRY<i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <div class="shop1">
                <ul>
                    <li><a href="privacy.php">PRIVACY POLICY</a></li>
                    <li><a href="returnpolicy.php">RETURN & REFUND</a></li>
                    <li><a href="term_condition.php">TERMS & CONDITIONS</a></li>
                    <li><a href="faqs.php">FAQS</a></li>
                    <li><a href="complain.php">COMPLAIN</a></li>

                  </ul>
                </div>
              </li> -->
              <li id="myac"><a href="myaccount.php">MY ACCOUNT</a></li>
            </ul>
          </div>


          <!--Optional JavaScript; choose one of the two!-->

          <!-- Option 1: jQuery and Boostrap Bundle (includes popper)-->
          <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"integrity="sha384=DfXdz2htph0lsSSs5nCTpuj/zy4c+OGpamoFVy38MVBne+IbbVYUew+OrCXaRkfj"crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeXDyx"crossorigin="anonymous"></script>
        -->
          <script src="js/jquery-3.5.1.min.js"></script>
          

<script type="text/javascript">
  /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}


</script>

<script>
  
  $('#plusbtn').click(function(){
    $('#subdrop').toggleClass("");
  });
</script>



    <!-- Optional JavaScript; choose one of the two -->

     <!-- Option 1: Bootstrap Bundle with Propper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> 

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  
  </body>
</html>
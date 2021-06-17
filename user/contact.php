<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="stay.css">
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>www.thestayclassy.com</title>
  </head>
  <body>


    <!-- header start here-------------------------------------->
   <?php
   include "header.php";
   
   ?>

   <div id="innerdrop">
    <div id="innerdrop1"><center>CONTACT US</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Contact us</center></div>
   </div>

   <div class="container">
     <center><img src="image\contactimage3.jpg" style="height: 45rem;width: 84vw;"></center>
   </div>

<div class="container" id="contacticon">
          <a href=""><i class="fa fa-instagram" aria-hidden="true" id="continsta"></i></a>
            <a href=""><i class="fa fa-facebook" aria-hidden="true" id="contfb"></i></a>
            <a href=""><i class="fa fa-pinterest" aria-hidden='true' id="contpint"></i></a>
            <a href=""><i class="fa fa-envelope" aria-hidden="true" id="contmail"></i></a>  
</div>

   <div class="container">
    <div class="row">
      <div class="col-3">
        <i class="fa fa-paper-plane-o" aria-hidden="true" id="contplane"></i> <span id="contnum">Tel : +91 8734802425</span>
                                                                    <div id="contemail">E-Mail : info@thestayclassy.com</div> 
      </div>
      <div class="col-3">
        <i class="fa fa-paper-plane-o" aria-hidden="true" id="contplane"></i> <span id="contadd">Ahmedabad, Gujarat, India</span>
                                                                    
      </div>
      
    </div>
     
   </div>
<div class="container">
   <form id="contactform">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10">
  <div class="form-row">
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 " id="conform1">
      <label for="inputEmail1" >Your Name*</label>
      <input type="text" class="form-control" id="inputEmail1" name="cont_name" >
    </div>
    <div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="conform1">
      <label for="inputEmail2" >Your Email*</label>
      <input type="email" class="form-control" id="inputEmail2" name="cont_email">
    </div>
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="conform1" >
      <label for="inputEmail3" >Mobile Number*</label>
      <input type="number" class="form-control" id="inputEmail3" name="cont_mobile">
    </div>
    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="conform1">
      <label for="inputEmail4">Subject*</label>
      <input type="text" class="form-control" id="inputEmail4" name="cont_subject">
    </div>
    <div class="form-group col-md-12" id="conform1">
    <label for="exampleFormControlTextarea1" >Your Message*</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="cont_msg"></textarea>
  </div>
    
  </div>
</div>
</div>
</form>
<button type="submit" class="btn btn-dark" name="submit" id="contbutton">SEND A MESSAGE</button>

</div>

<?php
 include "stayclassydb.php";

// if(isset($_REQUEST['submit'])){
//       if(($_REQUEST['cont_name'] == "") || ($_REQUEST['cont_email'] == "") || ($_REQUEST['cont_mobile'] == "") ($_REQUEST['cont_subject'] == "") || ($_REQUEST['cont_msg'] == "")){
//        $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid orange;background-color:orange;padding: 1rem;font-size: 1.5rem;color: white;margin-top:2rem;margin-bottom: 6rem;'>
//   <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> All fields are required. </div></div></div>";
//      } 
 

// $cont_name=$_REQUEST['cont_name'];
// $cont_email=$_REQUEST['cont_email'];
// $cont_mobile=$_REQUEST['cont_mobile'];
// $cont_subject=$_REQUEST['cont_subject'];
// $cont_msg=$_REQUEST['cont_msg'];
// $sql="INSERT INTO contact_master (cont_name,cont_email,cont_mobile,cont_subject,cont_msg) VALUES($cont_name,$cont_email,$cont_mobile,$cont_subject,$cont_msg)";
// if(mysqli_master_query($conn,$sql)){
//   $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid green;padding: 1rem;font-size: 1.5rem;color: white;margin-top:2rem;margin-bottom: 6rem;background-color:green;'>Message Sent Sucessfully. </div></div></div>";
//        }
//        else{
//          $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid orange;padding: 1rem;font-size: 1.5rem;color: white;background-color:orange;margin-top:2rem;margin-bottom: 6rem;'>
//   <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Unable To Sent Message. </div></div></div>";
//     }

?>




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
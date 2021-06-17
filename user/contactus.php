<?php
 
   include "header.php";
   

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
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>www.thestayclassy.com</title>
  </head>
  <body>
     <!-- header start here-------------------------------------->
  


<?php
  include "stayclassydb.php";
  


 if(isset($_REQUEST['sendme'])){
    if(($_REQUEST['contname'] == "") || ($_REQUEST['contemail'] == "") || ($_REQUEST['contmobile'] == "") || ($_REQUEST['contsubject'] == "") || ($_REQUEST['contmsg'] == "")){
        $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid orange;background-color:orange;padding: //1rem;font-size: 1.8rem;color: white;'>
    <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> All fields are required. </div></div></div>";
      } 
      else{
           $contname=$_REQUEST['contname'];
            $contemail=$_REQUEST['contemail'];
            $contmobile=$_REQUEST['contmobile'];
            $contsubject=$_REQUEST['contsubject'];
            $contmsg=$_REQUEST['contmsg'];
            $cont_status=$_REQUEST['cont_status'];
            $sql="INSERT INTO contact_master (cont_name,cont_email,cont_mobile,cont_subject,cont_msg,c_status) VALUES('$contname','$contemail','$contmobile','$contsubject','$contmsg','$cont_status')";
                if(mysqli_query($conn,$sql)){
              $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid green;padding: 1rem;font-size: 1.8rem;color: white;background-color:green;'>Message Sent Sucessfully. </div></div></div>";
                     }
                   else{
                         $regmsg="<div class='container' ><div class='row'><div col-12 style='border:.2rem solid orange;padding: 1rem;font-size: 1.8rem;color: white;background-color:orange;'>
                          <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Unable To Sent Message. </div></div></div>";
                      }

 }        }

?>





   <div id="innerdrop">
    <div id="innerdrop1"><center>CONTACT US</center></div>
   <div id="innerdrop2" ><center><i class="fa fa-home" aria-hidden="true"></i> Home / Contact us</center></div>
   </div>

<!----------------------------------------------------------------------------------------------------------------->


 <!-- Page Content -->
    <!-- About Page Starts Here -->
    <div class="contact-page" style="margin-top: 6rem;">
      <div class="container">
        <div class="row">
         
          <div class="col-md-6">
            <div id="map">
                <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.4647311507865!2d72.67862241479833!3d22.896223485017224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e8923d983aaa3%3A0xc77e621b4eb761bf!2sSamarpan%20bunglows%20barjadi!5e0!3m2!1sen!2sin!4v1617949313363!5m2!1sen!2sin" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <div class="container">
                <form  action="" method="POST">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <input name="contname" type="text" class="form-control" id="name" placeholder="Your name..." >
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input name="contemail" type="text" class="form-control" id="email" placeholder="Your email...">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input name="contmobile" type="text" class="form-control" id="subject" placeholder="Your mobile number..." >
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input name="contsubject" type="text" class="form-control" id="subject" placeholder="Subject...">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="contmsg" rows="6" class="form-control" id="message" placeholder="Your message..." ></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        
                        <button type="submit" class="btn btn-dark" name="sendme" id="contbutton">SEND A MESSAGE</button>

                      </fieldset>
                    </div>
                       <?php
                      if(isset($regmsg)){
                        echo "<div class='col-md-12'>$regmsg</div>";
                      }
                      ?>
                      <input type="hidden" name="cont_status" value="Pending">
                     
                      <div class="col-md-12">
                      <div class="share" style="margin-top: -1rem">
                      <div style="font-size: 1.5rem" class="ml-2">Tel : +91 8734802425</div>
                      <div style="font-size: 1.5rem" class="ml-2">E-Mail : info@thestayclassy.com</div> 
                        <h6 class="mt-3"><!-- You can also keep in touch on: --> <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-pinterest-p"></i></a></span></h6>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About Page Ends Here -->


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

                                                                                                                                                                                                                                        
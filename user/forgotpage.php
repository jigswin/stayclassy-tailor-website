<?php

include "stayclassydb.php";





if(isset($_REQUEST['forgotpass'])){
	$forgotemail=$_REQUEST['forgotemail'];
	$to_mail=$forgotemail;
	
	$subject="reset password";
	$body="click here to activate your account http://localhost/lastyearproject/user/resetpassword.php?forgotemail=$forgotemail";
    $headers="From:thegentlemanschoicestayclassy@gmail.com";
	$sql="SELECT * FROM user_master where email='$forgotemail'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	mail($to_mail, $subject, $body, $headers);
	$formsg= "<div class='col-10 mt-4 p-2 bg-success' >Please check your email box we send a link to change your password..</div>"	;
	}
	else{
		$formsg="<div class='col-10 mt-4 p-2 bg-warning'>Email does not exists..</div>";
	}
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

    <title>www.thestayclassy.com</title>
    <style type="text/css">
    	/*#lable1{
    		position: relative;
    		right: 60vw;
    	}*/

    </style>
  </head>
  <body>
    <?php
    include "headerlogin.php";
    ?>
    <center><div class="container mt-5">
    	<div style="font-size: 2.7rem;">FORGOT PASSWORD</div>
    	<form action="" method="POST" >
    	<div style="border:.1rem solid grey; padding-top:5rem;padding-bottom:5rem;padding-left:2rem;padding-right:2rem;margin-top: 2rem;background-color:rgb(236,240,241);font-size: 2rem;" class="mb-3 col-md-4 ">
  <div class="mb-3 col-md-10 ">
    <label for="exampleInputEmail1" class="form-label" id="label1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="forgotemail" style="height:3.5rem;font-size: 2rem">
</div>
<div class="d-grid gap-2 col-md-10 ">
    <button type="submit" class="btn btn-primary  mt-3 pl-3 pr-3 " name="forgotpass" style="font-size: 1.8rem">Send mail</button>
  </div>
  
 
 <?php 
 if(isset($formsg)){
 	echo $formsg;
 }
 ?>
</div>
</form>
    </div></center>
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
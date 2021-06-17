<?php
session_start();
include "stayclassydb.php";

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
//   echo "<script> location.href='login.php';</script>";
//   exit;
// }

// if(isset($_REQUEST['logout'])){
//   session_unset();
//   session_destroy();
//   echo "<script> location.href='login.php';</script>";
// }

//  if(isset($_SESSION['email'])){
// $useremail=$_SESSION['email'];


 // }



if(isset($_GET['u_id'])){
    $u_id=$_GET['u_id'];
                

      $usersql="SELECT * from user_master WHERE u_id='$u_id'";
   $userresult= mysqli_query($conn,$usersql);
   if(mysqli_num_rows($userresult)>0){
      while($useridrows = mysqli_fetch_assoc($userresult))
       {
      $email= $useridrows['email'];
      $_SESSION['loggedin']=$email;
      $_SESSION['email']=$email;
   }
 }
 else{
  echo "no id";
 }

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

     <link rel="stylesheet" type="text/css" href="">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>www.thestayclassy.com</title>

    <style type="text/css">
    	body{
    		background-color: rgb(240, 240, 240);
    	}
    	h1{
    		color: red;
    		position: relative;
    		top:13rem;
    		font-size: 4rem;
    	}
    	a{
    		position:relative;
			top:17rem;

		  }

    </style>
</head>
<body>
	<CENTER><h1>"YOUR ORDER PLACED SUCCESSFULLY"</h1>
	<a href="index.php?userid=<?php echo $_SESSION['loggedin'];?>&&usermail=<?php echo $_SESSION['email'];?>" class="btn btn-success">Back to home</a></CENTER>
</body>
</html>
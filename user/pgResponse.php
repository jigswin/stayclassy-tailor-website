<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

session_start();
require "stayclassydb.php";


// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
//   echo "<script> location.href='login.php';</script>";
//   exit;
// }
// $useremail=$_SESSION['email'];

//   $usersql="SELECT * from user_master WHERE email='$useremail'";
//    $userresult= mysqli_query($conn,$usersql);
//    if(mysqli_num_rows($userresult)>0){
//       while($useridrows = mysqli_fetch_assoc($userresult))
//        {
//       $userid= $useridrows['u_id'];
//       $_SESSION['userid']=$userid;
      
//    }
//  }
//  else{
//   echo "no id";
//  }

// if(isset($_REQUEST['logout'])){
  
  
//   session_unset();
//   session_destroy();
//   echo "<script> location.href='login.php';</script>";

// }


// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		$oid=$_POST['ORDERID'];
		// echo $oid."<br>";
		$oArr=explode('_', $oid);
		$userid=$oArr[1];
		$c_id=$oArr[2];
		$pay_status="Success";
		$mid=$_POST['MID'];
		$txnid=$_POST['TXNID'];
		$banktxnid=$_POST['BANKTXNID'];
		$txnamount=$_POST['TXNAMOUNT'];
		$currency=$_POST['CURRENCY'];
		$status=$_POST['STATUS'];
		$respcode=$_POST['RESPCODE'];
		$respmsg=$_POST['RESPMSG'];
		$txndate=$_POST['TXNDATE'];
		$gatewayname=$_POST['GATEWAYNAME'];
		$bankname=$_POST['BANKNAME'];
		$paymentmode=$_POST['PAYMENTMODE'];
		$checksumhash=$_POST['CHECKSUMHASH'];




		$sqlrecoveremail="SELECT * from user_master WHERE u_id='$userid'";
		$resultrecoveremail=mysqli_query($conn,$sqlrecoveremail);
		if(mysqli_num_rows($resultrecoveremail)>0){
			while($recoveremail=mysqli_fetch_assoc($resultrecoveremail)){
				$email_recover=$recoveremail['email'];
				$username_recover=$recoveremail['u_name'];
			}
		}
		//echo $email_recover;

		// echo $mid."<br>";
		// echo $txnid."<br>";
		// echo $banktxnid."<br>";
		// echo $txnamount."<br>";
		// echo $currency."<br>";
		// echo $status."<br>";
		// echo $respcode."<br>";
		// echo $respmsg."<br>";
		// echo $txndate."<br>";
		// echo $gatewayname."<br>";
		// echo $bankname."<br>";
		// echo $paymentmode."<br>";
		// echo $checksumhash."<br>";
		
		// echo $c_id."<br>";


		// echo "<b>Transaction status is success</b>" . "<br/>";

		//fetch data from order master and product master

	$fetchsql="SELECT * from order_master1 JOIN product_master ON order_master1.pro_id=product_master.pro_id WHERE u_id='$userid'";
	$fetchresult=mysqli_query($conn,$fetchsql);
	if(mysqli_num_rows($fetchresult)>0)
	{
		while($fetchrow=mysqli_fetch_assoc($fetchresult)){
			$pro_id=$fetchrow['pro_id'];
			$qty=$fetchrow['qty'];
			$pro_qty=$fetchrow['pro_qty'];
			$lessqty=$pro_qty-$qty;
			$updatesql="UPDATE product_master SET pro_qty='$lessqty' WHERE pro_id='$pro_id'";
			$updateres=mysqli_query($conn,$updatesql);
		}

	}
		



		$paysql="UPDATE checkout1 SET pay_status='$pay_status' WHERE c_id='$c_id'";
		$payresult=mysqli_query($conn,$paysql);
		$sqldel="DELETE FROM pattern_order_master1 WHERE u_id='$userid'";
      $resultdel=mysqli_query($conn,$sqldel);
      if($resultdel && $payresult)
      {
        $sqldel1="DELETE FROM cart_details WHERE u_id='$userid'";
      $resultdel1=mysqli_query($conn,$sqldel1);

      $paymentsql="INSERT INTO payment_master (c_id,pay_or_id,mid,txnid,banktxnid,txnamount,currency,status,respcode,respmsg,txndate,gatewayname,bankname,paymentmode,checksumhash) VALUES ('$c_id','$oid','$mid','$txnid','$banktxnid','$txnamount','$currency','$status','$respcode','$respmsg','$txndate','$gatewayname','$bankname','$paymentmode','$checksumhash')";
      $paymentresult=mysqli_query($conn,$paymentsql);
      if($paymentresult){

      	echo "<script>alert('payment successfull..')</script>";	
      	$to_mail=$email_recover;
		$subject="your order placed successfully";
		$body="Thank you ".$username_recover." for shopping...And your order Placed successfully..Your ORDER ID: ".$c_id.". You can track your product using this order id.";
		$headers="From:thegentlemanschoicestayclassy@gmail.com";
		mail($to_mail, $subject, $body, $headers);
      }
      else{
      	echo "<script>alert('payment not successfull..')</script>";	
      }


      if($resultdel1){
									      
							
        $sqldel2="DELETE FROM order_master1 WHERE u_id='$userid'";
        $resultdel2=mysqli_query($conn,$sqldel2);
        $sqldel3="DELETE FROM order_pattern1 WHERE u_id='$userid'";
        $resultdel3=mysqli_query($conn,$sqldel3);
         $sqldel4="DELETE FROM measuretype WHERE u_id='$userid'";
        $resultdel4=mysqli_query($conn,$sqldel4);
        $sqldel5="DELETE FROM appointment WHERE u_id='$userid'";
        $resultdel5=mysqli_query($conn,$sqldel5);
        $sqldel6="DELETE FROM self_measurement1 WHERE u_id='$userid'";
        $resultdel6=mysqli_query($conn,$sqldel6);
        if($resultdel2 && $resultdel3 && $resultdel4 && $resultdel5 && $resultdel6){
        echo "<script>location.href='orderplace.php?u_id=$userid'</script>";
        }
        else{
        	//echo "error";
        }
    }
}

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
 	}
	else {
		 echo "<script>alert('payment not successfull..')</script>";	
		 echo "<script>location.href='orderplace.php?u_id=$userid'</script>";
	}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 			// echo $paramName['CUST_ID'];
	// 	}
	// }
	

}
else {
	
}

?>
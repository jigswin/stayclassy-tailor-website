<?php
	session_start();

	include "admindb.php";



	//-----------------------------------login admin details-----------------------------------------------------

	if(isset($_POST['loginbtn'])){
		$loginemail=$_POST['loginemail'];
		$loginpassword=$_POST['loginpassword'];
		$query="SELECT * FROM admin_master WHERE email='$loginemail' AND password='$loginpassword'";
		$query_run=mysqli_query($conn,$query);

		if(mysqli_fetch_array($query_run)){
			$_SESSION['username']=$loginemail;
			header('Location:index.php');
		}
		else{
			$_SESSION['status']="Email ID And Password Is Not Valid";
			header("Location:login.php");
		}
	}



	//-----------------------------insert admin detail-----------------------------------------------------------


if(isset($_POST['check_submit_btn'])){
	$email=$_POST['email_id'];
	$checkemail="SELECT * FROM admin_master WHERE email='$email'";
	$checkresult=mysqli_query($conn,$checkemail);
	if(mysqli_num_rows($checkresult)>0){
		echo "Email already exist.Please try another email";
	}
	else
	{
		
	}

}

if(isset($_POST['check_submit_btn1'])){
	$password1=$_POST['password'];
	
	if(strlen($password1) < 8){
		echo "Please enter atleast 8 character.";
	}
	else
	{
		
	}

}


if(isset($_POST['registerbtn'])){
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$mobile=$_POST['mobile'];
	
	$alredysql="SELECT email from admin_master WHERE email='$email'";
	$alreadyresult=mysqli_query($conn,$alredysql);
	if(mysqli_num_rows($alreadyresult)>0){
		$_SESSION['status']="Email id already exist.Please try another..";
		 $_SESSION['status_code']="info";
		header("Location:adminregister.php");
	}
	else{
		
	if($password === $cpassword){
	$sql="INSERT INTO admin_master (username,email,password,mobile) VALUES ('$username','$email','$password','$mobile')";
	$result=mysqli_query($conn,$sql);
	if($result){
		$_SESSION['status']="Admin Profile Added";
		 $_SESSION['status_code']="success";
		header("Location:adminregister.php");
	}
	else{
		$_SESSION['status']="Admin Profile Not Added";
		$_SESSION['status_code']="error";
		header("Location:adminregister.php");
	}
	}
	else{
		$_SESSION['status']="Password And Confirm Password Are Not Matched";
		$_SESSION['status_code']="warning";
		header("Location:adminregister.php");
	}

}
}




// -----------------------------update admin detail-----------------------------------------------------------

if(isset($_POST['updatebtn'])){
	$edit_username=$_POST['edit_username'];
	$edit_email=$_POST['edit_email'];
	$edit_password=$_POST['edit_password'];
	$edit_id=$_POST['edit_id'];
	$edit_mobile=$_POST['edit_mobile'];

	$sql1="UPDATE admin_master SET username='$edit_username', email='$edit_email', password='$edit_password', mobile='$edit_mobile' WHERE id='$edit_id'";
	$result1=mysqli_query($conn,$sql1);
	if($result1){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location: adminregister.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: adminregister.php");
	}
}



// -----------------------------delete admin detail-----------------------------------------------------------

if(isset($_POST['deletebtn'])){
	$del_id=$_POST['deleteid'];
	$sql2="DELETE FROM admin_master WHERE id='$del_id'";
	$result2=mysqli_query($conn,$sql2);
	if($result2){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location: adminregister.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location: adminregister.php");
	}
}





// -----------------------------logout admin panel-----------------------------------------------------------

if(isset($_POST['logoutbtn'])){

	session_destroy();
	unset($_SESSION['username']);
	header("Location:login.php");
}



?>



<?php

// -------------user update-----------------------------------------------------------------------------------

  if(isset($_POST['update_btn'])){
  $edit_username1=$_POST['edit_username1'];
  $edit_email1=$_POST['edit_email1'];
  $edit_password1=$_POST['edit_password1'];
  $edit_id1=$_POST['edit_id1'];
  $edit_mobile1=$_POST['edit_mobile1'];

  $sql3="UPDATE user_master SET u_name='$edit_username1', email='$edit_email1', password='$edit_password1', mobile='$edit_mobile1' WHERE u_id='$edit_id1'";
  $result3=mysqli_query($conn,$sql3);
  if($result3){
     $_SESSION['status']="Your Data Is Updated";
     $_SESSION['status_code']="success";
    header("Location:user_register.php");
  }
  else{
    $_SESSION['status']="Your Data Is Not Updated";
    $_SESSION['status_code']="error";
    header("Location:user_register.php");
  }
}



// ----------------delete user detail--------------------------------------------------

if(isset($_POST['delete_btn'])){
	$del_id1=$_POST['delete_id'];
	$sql4="DELETE FROM user_master WHERE u_id='$del_id1'";
	$result4=mysqli_query($conn,$sql4);
	if($result4){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:user_register.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:user_register.php");
	}
}


//-------------------------------------------- INSERT product details--------------------------------------
if(isset($_POST['productsavebtn'])){
	$pro_name=$_POST['pro_name'];
	$pro_sub_cate=$_POST['pro_sub_cate'];
	$pro_cate=$_POST['pro_cate'];
	$pro_price=$_POST['pro_price'];
	$pro_images=$_FILES['pro_images']['name'];
	$pro_qty=$_POST['pro_qty'];
	$pro_color=$_POST['pro_color'];
	$pro_desc=$_POST['pro_desc'];
	$target="upload/".basename($_FILES['pro_images']['name']);
	echo $pro_name."<br>";
	echo $pro_sub_cate."<br>";
	echo $pro_price."<br>";
	echo $pro_qty."<br>";
	echo $pro_color."<br>";
	echo $pro_desc."<br>";
	echo $pro_images."<br>";
	echo $target."<br>";


$sql105="INSERT INTO product_master (sub_cate_id,cate_id,pro_name,pro_color,pro_price,description,pro_image,pro_qty) VALUES ('$pro_sub_cate','$pro_cate','$pro_name','$pro_color','$pro_price','$pro_desc','$pro_images','$pro_qty')";
	$result105=mysqli_query($conn,$sql105);
	if($result105){
		move_uploaded_file($_FILES['pro_images']['tmp_name'],$target);
		$_SESSION['status']="Product added";
		$_SESSION['status_code']="success";
		
		header('Location:product.php');
		//echo "success";
	}
	else
	{
		$_SESSION['status']="Product Not added";
 		$_SESSION['status_code']="error";
			
	 	 header('Location:product.php');
	 	// echo "failed";
	 }
	}


// -----------------------------update product detail-----------------------------------------------------------

if(isset($_POST['pro_update_btn'])){
	$pro_edit_name=$_POST['pro_edit_name'];
	$pro_edit_sub_cate=$_POST['pro_edit_sub_cate'];
	$pro_edit_cate=$_POST['pro_edit_cate'];
	$pro_edit_price=$_POST['pro_edit_price'];
	$pro_edit_color=$_POST['pro_edit_color'];
	$pro_edit_qty=$_POST['pro_edit_qty'];
	$pro_edit_description=$_POST['pro_edit_description'];
	$pro_edit_id=$_POST['pro_edit_id'];
	$pro_images=$_FILES["pro_images"]["name"];
	$target1="upload/".basename($_FILES["pro_images"]["name"]);
	$pro_img_old=$_POST['pro_img_old'];
	// $target2="upload/".basename($_FILES["pro_img_old"]["name"])
	
	if($pro_images != '')
		{
			$update_filename=$_FILES["pro_images"]["name"];
		}
		else
		{
			$update_filename=$pro_img_old;
		}

$sql14="UPDATE product_master SET sub_cate_id='$pro_edit_sub_cate',cate_id='$pro_edit_cate', pro_name='$pro_edit_name',pro_color='$pro_edit_color', pro_price='$pro_edit_price', description='$pro_edit_description', pro_image='$update_filename', pro_qty='$pro_edit_qty' WHERE pro_id='$pro_edit_id'";
	$result14=mysqli_query($conn,$sql14);

	if($result14)
	{
		move_uploaded_file($_FILES["pro_images"]["tmp_name"],$target1);
		$_SESSION['status']="Product updated";
		$_SESSION['status_code']="success";
		header('Location:product.php');
	}
	else
	{
		$_SESSION['status']="Product Not updated";
		$_SESSION['status_code']="error";
		header('Location:product.php');
	}




}

// -----------------------------delete product detail-------------------------------------------------------------------------

if(isset($_POST['pro_del_btn'])){
	$pro_del_id=$_POST['pro_delid'];
	$sql15="DELETE FROM product_master WHERE pro_id='$pro_del_id'";
	$result15=mysqli_query($conn,$sql15);
	if($result15){
		$_SESSION['status']="Product Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:product.php");
	}
	else{
		$_SESSION['status']="Product Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:product.php");
	}
}








// -----------------------------update contact detail-----------------------------------------------------------

if(isset($_POST['con_update_btn'])){
	$con_edit_name=$_POST['con_edit_name'];
	$con_edit_email=$_POST['con_edit_email'];
	$con_edit_msg=$_POST['con_edit_msg'];
	$con_edit_subject=$_POST['con_edit_subject'];
	$con_edit_id=$_POST['con_edit_id'];
	$con_edit_mobile=$_POST['con_edit_mobile'];
	$con_edit_status=$_POST['con_edit_status'];

	$sql6="UPDATE contact_master SET cont_name='$con_edit_name', cont_email='$con_edit_email', cont_msg='$con_edit_msg', cont_mobile='$con_edit_mobile', cont_subject='$con_edit_subject',c_status='$con_edit_status' WHERE cont_id='$con_edit_id'";
	$result6=mysqli_query($conn,$sql6);
	if($result6){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location: contact.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: contact.php");
	}
}


// -----------------------------delete contact detail-------------------------------------------------------------------------

if(isset($_POST['con_delete_btn'])){
	$con_del_id=$_POST['con_delete_id'];
	$sql7="DELETE FROM contact_master WHERE cont_id='$con_del_id'";
	$result7=mysqli_query($conn,$sql7);
	if($result7){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:contact.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:contact.php");
	}
}



?>


<?php


	// -----------------------------insert category detail-----------------------------------------------------------
if(isset($_POST['cate_btn'])){
	$cate_name=$_POST['cate_name1'];
	$cate_description=$_POST['cate_description1'];
	$sql12="INSERT INTO category_master (cate_name,description) VALUES('$cate_name','$cate_description')";
	$result12=mysqli_query($conn,$sql12);
	if($result12){
		$_SESSION['status']="category Added";
		$_SESSION['status_code']="success";
		header("Location:category.php");
		}
	
	else{
		$_SESSION['status']="category Not Added";
		$_SESSION['status_code']="error";
		header("Location:category.php");
		}
}


// -----------------------------update category detail-----------------------------------------------------------

if(isset($_POST['cate_update_btn'])){
	$cate_edit_name=$_POST['cate_edit_name'];
	$cate_edit_description=$_POST['cate_edit_description'];
	$cate_edit_id=$_POST['cate_edit_id'];
	

	$sql8="UPDATE category_master SET cate_name='$cate_edit_name', description='$cate_edit_description' WHERE cate_id='$cate_edit_id'";
	$result8=mysqli_query($conn,$sql8);
	if($result8){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location: category.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: category.php");
	}
}


// -----------------------------delete category detail--------------------------------------------------------------------

if(isset($_POST['cate_deletebtn'])){
	$cate_del_id=$_POST['cate_deleteid'];
	$sql9="DELETE FROM category_master WHERE cate_id='$cate_del_id'";
	$result9=mysqli_query($conn,$sql9);
	if($result9){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:category.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:category.php");
	}
}


	// -----------------------------insert sub category detail-----------------------------------------------------------

	if(isset($_POST['sub_cate_btn'])){
	$sub_cate_name2=$_POST['sub_cate_name1'];
	$sub_cate_id2=$_POST['sub_cate_cate1'];
	$sub_cate_description2=$_POST['sub_cate_description1'];
	$sql13="INSERT INTO sub_category (cate_id,sub_cate_name,description) VALUES('$sub_cate_id2','$sub_cate_name2','$sub_cate_description2')";
	$result13=mysqli_query($conn,$sql13);
	if($result13){
		$_SESSION['status']=" Sub category Added";
		$_SESSION['status_code']="success";
		header("Location:sub_category.php");
		}
	
	else{
		$_SESSION['status']=" Sub category Not Added";
		$_SESSION['status_code']="error";
		header("Location:sub_category.php");
		}
}


// -----------------------------update sub category detail-----------------------------------------------------------

if(isset($_POST['sub_cate_update_btn'])){
	$sub_cate_edit_name=$_POST['sub_cate_edit_name'];
	$sub_cate_edit_description=$_POST['sub_cate_edit_description'];
	
	$sub_cate_edit_id=$_POST['sub_cate_edit_id'];
	$sub_cate_edit_cate=$_POST['sub_cate_edit_cate'];
	

	$sql10="UPDATE sub_category SET sub_cate_name='$sub_cate_edit_name', description='$sub_cate_edit_description', cate_id='$sub_cate_edit_cate' WHERE sub_cate_id='$sub_cate_edit_id'";
	$result10=mysqli_query($conn,$sql10);
	if($result10){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location: sub_category.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: sub_category.php");
	}
}


// -----------------------------delete sub category detail------------------------------------------------------------

if(isset($_POST['sub_cate_deletebtn'])){
	$sub_cate_del_id=$_POST['sub_cate_deleteid'];
	$sql11="DELETE FROM sub_category WHERE sub_cate_id='$sub_cate_del_id'";
	$result11=mysqli_query($conn,$sql11);
	if($result11){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:sub_category.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:sub_category.php");
	}
}

//-------------------------------------------- INSERT PATTERN details--------------------------------------



if(isset($_POST['pattern_btn'])){
  $pattern_name=$_POST['pattern_name'];
  $pattern_sub_cate=$_POST['pattern_sub_cate'];
  $pattern_price=$_POST['pattern_price'];
  $pattern_images=$_FILES["pattern_images"]["name"];
  $pattern_cate=$_POST['pattern_cate'];
  $pattern_description=$_POST['pattern_description'];
  $target1="upload/".basename($_FILES["pattern_images"]["name"]);
  

  $sqlpattern="INSERT INTO pattern_details (pat_cat_name,sub_cate_id,pat_name,pat_price,pat_description,pat_img) VALUES('$pattern_cate','$pattern_sub_cate','$pattern_name','$pattern_price','$pattern_description','$pattern_images')";
  $resultpattern=mysqli_query($conn,$sqlpattern);
  
  if($resultpattern){
    if (move_uploaded_file($_FILES["pattern_images"]["tmp_name"],$target1)){
    $_SESSION['status']="Pattern added";
    $_SESSION['status_code']="success";
     echo "<script>location.href='pattern.php';</script>";
  }
}
  else{
     $_SESSION['status']="Pattern Not added";
    $_SESSION['status_code']="error";
     echo "<script>location.href='pattern.php';</script>";
    
    
    
  }
}



// -----------------------------update pattern detail-----------------------------------------------------------

if(isset($_POST['pat_update_btn'])){
	$pat_edit_name=$_POST['pat_edit_name'];
	$pat_edit_sub_cate=$_POST['pat_edit_sub_cate'];
	$pat_edit_price=$_POST['pat_edit_price'];
	$pat_edit_description=$_POST['pat_edit_description'];
	$pat_edit_id=$_POST['pat_edit_id'];
	$pat_images=$_FILES["pat_images"]["name"];
	$target1="upload/".basename($_FILES["pat_images"]["name"]);
	$pat_img_old=$_POST['pat_img_old'];
	// $target2="upload/".basename($_FILES["pro_img_old"]["name"])
	
	if($pat_images != '')
		{
			$update_filename=$_FILES["pat_images"]["name"];
		}
		else
		{
			$update_filename=$pat_img_old;
		}

$sql14="UPDATE pattern_details SET sub_cate_id='$pat_edit_sub_cate', pat_name='$pat_edit_name', pat_price='$pat_edit_price', pat_description='$pat_edit_description', pat_img='$update_filename' WHERE pat_id='$pat_edit_id'";
	$result14=mysqli_query($conn,$sql14);

	if($result14)
	{
		move_uploaded_file($_FILES["pat_images"]["tmp_name"],$target1);
		$_SESSION['status']="Pattern updated";
		$_SESSION['status_code']="success";
		header('Location:pattern.php');
	}
	else
	{
		$_SESSION['status']="Pattern Not updated";
		$_SESSION['status_code']="error";
		header('Location:pattern.php');
	}




}


// -----------------------------delete pattern detail------------------------------------------------------------

if(isset($_POST['pat_del_btn'])){
	$pat_delid=$_POST['pat_delid'];
	$sqldel="DELETE FROM pattern_details WHERE pat_id='$pat_delid'";
	$resultdel=mysqli_query($conn,$sqldel);
	if($resultdel){
		$_SESSION['status']="Pattern Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:pattern.php");
	}
	else{
		$_SESSION['status']="Pattern Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:pattern.php");
	}
}

// -----------------------------insert PATTERN - sub category detail-----------------------------------------------------------

	if(isset($_POST['pattern_sub_cate_btn'])){
	$pat_sub_cate_name=$_POST['sub_cate_name'];
	$pat_sub_cate_id=$_POST['sub_cate_cate'];
	$pat_sub_cate_description=$_POST['sub_cate_description'];
	$sql23="INSERT INTO pattern_sub_category (cate_id,sub_cate_name,discription) VALUES('$pat_sub_cate_id','$pat_sub_cate_name','$pat_sub_cate_description')";
	$result23=mysqli_query($conn,$sql23);
	if($result23){
		$_SESSION['status']=" Sub category Added";
		$_SESSION['status_code']="success";
		header("Location:pattern_sub_category.php");
		}
	
	else{
		$_SESSION['status']=" Sub category Not Added";
		$_SESSION['status_code']="error";
		header("Location:pattern_sub_category.php");
		}
}

// -----------------------------update pattern sub category detail-----------------------------------------------------------

if(isset($_POST['pat_sub_cate_update_btn'])){
	$pat_sub_cate_edit_name=$_POST['pat_sub_cate_edit_name'];
	$pat_sub_cate_edit_description=$_POST['pat_sub_cate_edit_description'];
	
	$pat_sub_cate_edit_id=$_POST['pat_sub_cate_edit_id'];
	

	$sql24="UPDATE pattern_sub_category SET sub_cate_name='$pat_sub_cate_edit_name', discription='$pat_sub_cate_edit_description' WHERE sub_cate_id='$pat_sub_cate_edit_id'";
	$result24=mysqli_query($conn,$sql24);
	if($result24){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location: pattern_sub_category.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: pattern_sub_category.php");
	}
}


// -----------------------------delete pattern sub category detail------------------------------------------------------------

if(isset($_POST['pattern_sub_cate_deletebtn'])){
	$pat_sub_cate_del_id=$_POST['pattern_sub_cate_deleteid'];
	$sql25="DELETE FROM pattern_sub_category WHERE sub_cate_id='$pat_sub_cate_del_id'";
	$result25=mysqli_query($conn,$sql25);
	if($result25){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:pattern_sub_category.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:pattern_sub_category.php");
	}
}





// -----------------------------update order_master-----------------------------------------------------------

if(isset($_POST['order_master_update_btn'])){
	$order_master_edit_id=$_POST['order_master_edit_id'];
	$order_master_edit_fname=$_POST['order_master_edit_fname'];
	$order_master_edit_lname=$_POST['order_master_edit_lname'];
	$order_master_edit_email=$_POST['order_master_edit_email'];
	$order_master_edit_mobile=$_POST['order_master_edit_mobile'];
	$order_master_edit_add1=$_POST['order_master_edit_add1'];
	$order_master_edit_add2=$_POST['order_master_edit_add2'];
	$order_master_edit_city=$_POST['order_master_edit_city'];
	$order_master_edit_state=$_POST['order_master_edit_state'];
	$order_master_edit_zip=$_POST['order_master_edit_zip'];
	$order_master_edit_qty=$_POST['order_master_edit_qty'];
	$order_master_edit_total=$_POST['order_master_edit_total'];
	$order_master_edit_date=$_POST['order_master_edit_date'];
	$order_master_edit_pay_status=$_POST['order_master_edit_pay_status'];
	$order_master_edit_order_status=$_POST['order_master_edit_order_status'];
	$order_master_edit_order_return_money=$_POST['order_master_edit_order_return_money'];
	if($order_master_edit_order_status=='Canceled')
	{

		$sqlcancle="SELECT * FROM product_master JOIN order_master2 ON product_master.pro_id=order_master2.pro_id WHERE c_id='$order_master_edit_id'";
		$resultcancle=mysqli_query($conn,$sqlcancle);
		if(mysqli_num_rows($resultcancle)>0){
			while($Cancelerows=mysqli_fetch_assoc($resultcancle)){
				$totalproduct=$Cancelerows['pro_qty'];
				$pro_id_cancle=$Cancelerows['pro_id'];
				$orderqty=$Cancelerows['qty'];
				$cancleproduct=$totalproduct+$orderqty;
				$updatesql="UPDATE product_master SET pro_qty='$cancleproduct' WHERE pro_id='$pro_id_cancle'";
				$updateresult=mysqli_query($conn,$updatesql);
				if($updateresult){
								$sql201="UPDATE checkout1 SET c_f_name='$order_master_edit_fname',c_l_name='$order_master_edit_lname',c_email='$order_master_edit_email',c_add='$order_master_edit_add1',c_add2='$order_master_edit_add2',c_mobile='$order_master_edit_mobile',c_city='$order_master_edit_city',c_state='$order_master_edit_state',c_zip='$order_master_edit_zip',c_date='$order_master_edit_date',c_qty='$order_master_edit_qty',c_total='$order_master_edit_total',pay_status='$order_master_edit_pay_status',order_status='$order_master_edit_order_status',return_money='$order_master_edit_order_return_money' WHERE c_id='$order_master_edit_id'";
						$result201=mysqli_query($conn,$sql201);
							if($result201){
								$_SESSION['status']="Your Data Is Updated";
								$_SESSION['status_code']="success";
								header("Location: order_master.php");
							}
							else{
								$_SESSION['status']="Your Data Is Not Updated";
								$_SESSION['status_code']="error";
								header("Location: order_master.php");
							}

						}
				else
				{
					echo "product not added";
				}
					}
					}
		
				}


	else{

	$sql101="UPDATE checkout1 SET c_f_name='$order_master_edit_fname',c_l_name='$order_master_edit_lname',c_email='$order_master_edit_email',c_add='$order_master_edit_add1',c_add2='$order_master_edit_add2',c_mobile='$order_master_edit_mobile',c_city='$order_master_edit_city',c_state='$order_master_edit_state',c_zip='$order_master_edit_zip',c_date='$order_master_edit_date',c_qty='$order_master_edit_qty',c_total='$order_master_edit_total',pay_status='$order_master_edit_pay_status',order_status='$order_master_edit_order_status',return_money='$order_master_edit_order_return_money' WHERE c_id='$order_master_edit_id'";
	$result101=mysqli_query($conn,$sql101);
	if($result101){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location: order_master.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: order_master.php");
	}
}
 }

// -----------------------------delete order master------------------------------------------------------------

if(isset($_POST['order_master_delete_btn'])){
	$order_master_delete_id=$_POST['order_master_delete_id'];
	$sql102="DELETE FROM checkout1 WHERE c_id='$order_master_delete_id'";
	$result102=mysqli_query($conn,$sql102);
	if($result102){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:order_master.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:order_master.php");
	}
}



// -----------------------------update measure type-----------------------------------------------------------

if(isset($_POST['measure_type_update_btn'])){
	$measure_type_edit_id=$_POST['measure_type_edit_id'];
	$measure_type_edit_name=$_POST['measure_type_edit_name'];
	$measure_type_edit_date=$_POST['measure_type_edit_date'];
	

	$sql103="UPDATE measuretype1 SET measure_type='$measure_type_edit_name', measure_date='$measure_type_edit_date' WHERE measure_id='$measure_type_edit_id'";
	$result103=mysqli_query($conn,$sql103);
	if($result103){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location: measure_type.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: measure_type.php");
	}
}

// -----------------------------delete measure type------------------------------------------------------------

if(isset($_POST['measure_type_delete_btn'])){
	$measure_type_delete_id=$_POST['measure_type_delete_id'];
	$sql104="DELETE FROM measuretype1 WHERE measure_id='$measure_type_delete_id'";
	$result104=mysqli_query($conn,$sql104);
	if($result104){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:measure_type.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:measure_type.php");
	}
}

// -----------------------------delete product order------------------------------------------------------------

if(isset($_POST['product_order_delete_btn'])){
	$product_order_delete_id=$_POST['product_order_delete_id'];
	$sql105="DELETE FROM order_master2 WHERE or_id='$product_order_delete_id'";
	$result105=mysqli_query($conn,$sql105);
	if($result105){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:product_order.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:product_order.php");
	}
}

// -----------------------------delete pattern order------------------------------------------------------------

if(isset($_POST['pattern_order_delete_btn'])){
	$pattern_order_delete_id=$_POST['pattern_order_delete_id'];
	$sql106="DELETE FROM order_pattern2 WHERE or_patid='$pattern_order_delete_id'";
	$result106=mysqli_query($conn,$sql106);
	if($result106){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:pattern_order.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:pattern_order.php");
	}
}



// -----------------------------update self-measurement ------------------------------------------------------------

if(isset($_POST['self_update_btn'])){
	$self_edit_id=$_POST['self_edit_id'];
	$s_collar_edit=$_POST['s_collar_edit'];
	$s_chest_edit=$_POST['s_chest_edit'];
	$s_sleeve_length_edit=$_POST['s_sleeve_length_edit'];
	$s_shoulder_length_edit=$_POST['s_shoulder_length_edit'];
	$s_cuff_edit=$_POST['s_cuff_edit'];
	$s_waist_edit=$_POST['s_waist_edit'];
	$s_length_edit=$_POST['s_length_edit'];
	$s_neck_edit=$_POST['s_neck_edit'];
	$t_ankle_edit=$_POST['t_ankle_edit'];
	$t_seat_edit=$_POST['t_seat_edit'];
	$t_hip_edit=$_POST['t_hip_edit'];
	$t_langot_edit=$_POST['t_langot_edit'];
	$t_zip_edit=$_POST['t_zip_edit'];
	$t_thai_edit=$_POST['t_thai_edit'];
	$t_length_edit=$_POST['t_length_edit'];

	$sql107="UPDATE self_measurement3 SET s_collar='$s_collar_edit',s_chest='$s_chest_edit',s_sleeve_length='$s_sleeve_length_edit',s_shoulder_length='$s_shoulder_length_edit',s_cuff='$s_cuff_edit',s_waist='$s_waist_edit',s_shirt_length='$s_length_edit',s_neck='$s_neck_edit',t_ankle='$t_ankle_edit',t_seat='$t_seat_edit',t_hip='$t_hip_edit',t_langot='$t_langot_edit',t_zip_size='$t_zip_edit',t_thai='$t_thai_edit',t_pent_length='$t_length_edit' WHERE self_id='$self_edit_id'";
	$result107=mysqli_query($conn,$sql107);
	if($result107){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location: selfmeasurement.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: selfmeasurement.php");
	}
}
	

// -----------------------------delete self-measurement------------------------------------------------------------

if(isset($_POST['self_delete_btn'])){
	$self_delete_id=$_POST['self_delete_id'];
	$sql108="DELETE FROM self_measurement3 WHERE self_id='$self_delete_id'";
	$result108=mysqli_query($conn,$sql108);
	if($result108){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:selfmeasurement.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:selfmeasurement.php");
	}
}


// -----------------------------update appointment-----------------------------------------------------------

if(isset($_POST['appoint_update_btn'])){
	$appoint_edit_id=$_POST['appoint_edit_id'];
	$ap_name_edit=$_POST['ap_name_edit'];
	$ap_add_edit=$_POST['ap_add_edit'];
	$ap_add2_edit=$_POST['ap_add2_edit'];
	$ap_city_edit=$_POST['ap_city_edit'];
	$ap_state_edit=$_POST['ap_state_edit'];
	$ap_zip_edit=$_POST['ap_zip_edit'];
	$ap_email_edit=$_POST['ap_email_edit'];
	$ap_mobile_edit=$_POST['ap_mobile_edit'];
	$ap_date_edit=$_POST['ap_date_edit'];
	$ap_time_edit=$_POST['ap_time_edit'];
	$ap_totime_edit=$_POST['ap_totime_edit'];
	$ap_date_old=$_POST['ap_date_old'];
	if($ap_date_edit != '')
	{
		$appoint_date=$ap_date_edit;
	}
	else
	{
		$appoint_date=$ap_date_old;
	}
	

	$sql109="UPDATE appointment1 SET name='$ap_name_edit',address='$ap_add_edit',address_2='$ap_add2_edit',city='$ap_city_edit',state='$ap_state_edit',zip='$ap_zip_edit',email='$ap_email_edit',a_mobile='$ap_mobile_edit',a_date='$appoint_date',a_time='$ap_time_edit',to_time='$ap_totime_edit'  WHERE appoint_id='$appoint_edit_id'";
	$result109=mysqli_query($conn,$sql109);
	if($result109){
		$_SESSION['status']="Your Data Is Updated";
		$_SESSION['status_code']="success";
		header("Location:appointment.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Updated";
		$_SESSION['status_code']="error";
		header("Location: appointment.php");
	}
}


// -----------------------------delete appointment------------------------------------------------------------

if(isset($_POST['appoint_del_btn'])){
	$appoint_delid=$_POST['appoint_delid'];
	$sql110="DELETE FROM appointment1 WHERE appoint_id='$appoint_delid'";
	$result110=mysqli_query($conn,$sql110);
	if($result110){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:appointment.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:appointment.php");
	}
}






// -----------------------------insert appointment-measure detail------------------------------------------------------------
if(isset($_POST['ap_measure_save'])){
	$appoint_id=$_POST['appoint_id'];
	$s_collar=$_POST['s_collar'];
	$s_chest=$_POST['s_chest'];
	$s_sleeve_length=$_POST['s_sleeve_length'];
	$s_shoulder_length=$_POST['s_shoulder_length'];
	$s_cuff=$_POST['s_cuff'];
	$s_waist=$_POST['s_waist'];
	$s_length=$_POST['s_length'];
	$s_neck=$_POST['s_neck'];
	$t_ankle=$_POST['t_ankle'];
	$t_seat=$_POST['t_seat'];
	$t_hip=$_POST['t_hip'];
	$t_langot=$_POST['t_langot'];
	$t_zip=$_POST['t_zip'];
	$t_thai=$_POST['t_thai'];
	$t_length=$_POST['t_length'];

	$sql111="INSERT into appointment_measure1(appoint_id,s_collar,s_chest,s_sleeve_length,s_shoulder_length,s_cuff,s_waist,s_shirt_length,s_neck,t_ankle,t_seat,t_hip,t_langot,t_zip,t_thai,t_pent_length) VALUES('$appoint_id','$s_collar','$s_chest','$s_sleeve_length','$s_shoulder_length','$s_cuff','$s_waist','$s_length','$s_neck','$t_ankle','$t_seat','$t_hip','$t_langot','$t_zip','$t_thai','$t_length')";
	$result111=mysqli_query($conn,$sql111);
	if($result111){
		$sql112="SELECT status from appointment1 WHERE appoint_id='$appoint_id'";
		$result112=mysqli_query($conn,$sql112);
		if(mysqli_num_rows($result112)>0){
			while($apfe=mysqli_fetch_assoc($result112)){
				$statusap=$apfe['status'];
			}
		}
		$sql113="UPDATE appointment1 SET status='Success' WHERE appoint_id='$appoint_id'";
		$result113=mysqli_query($conn,$sql113);
		if($result113){
		$_SESSION['status']="Your Data Is Inserted";
		$_SESSION['status_code']="success";
		header("Location:appointment.php");
		}
		else{
		$_SESSION['status']="Your Data Is Not Inserted";
		$_SESSION['status_code']="error";
		header("Location: appointment.php");
	}
		
	}
	else{
		$_SESSION['status']="Your Data Is Not enter";
		$_SESSION['status_code']="error";
		header("Location: appointment.php");
	}
}



//----------------------------------appointment measure data edit update here--------------------------------------------


// if(isset($_POST['ap_measure_update'])){
          
//           $ap_id=$_POST['ap_id'];
//            $s_collar_edit1=$_POST['s_collar'];
//            $s_chest_edit1=$_POST['s_chest'];
//            $s_sleeve_length_edit1=$_POST['s_sleeve_length'];
//            $s_shoulder_length_edit1=$_POST['s_shoulder_length'];
//            $s_cuff_edit1=$_POST['s_cuff'];
//            $s_waist_edit1=$_POST['s_waist'];
//            $s_length_edit1=$_POST['s_length'];
//            $s_neck_edit1=$_POST['s_neck'];
//            $t_ankle_edit1=$_POST['t_ankle'];
//            $t_seat_edit1=$_POST['t_seat'];
//            $t_hip_edit1=$_POST['t_hip'];
//            $t_langot_edit1=$_POST['t_langot'];
//            $t_zip_edit1=$_POST['t_zip'];
//            $t_thai_edit1=$_POST['t_thai'];
//            $t_length_edit1=$_POST['t_length'];
//            echo $s_collar_edit1;
//            echo $ap_id;
//            echo $s_chest_edit1;
//            echo $s_sleeve_length_edit1;
//            echo $s_shoulder_length_edit1;
//            echo $s_cuff_edit1;
//            echo $s_waist_edit1;
//            echo $s_length_edit1;
//            echo $s_neck_edit1;
//            echo $t_ankle_edit1;
//            echo $t_seat_edit1;
//            echo $t_hip_edit1;
//            echo $t_langot_edit1;
//            echo $t_zip_edit1;
//            echo $t_thai_edit1;
//            echo $t_length_edit1;



//            $sql115="UPDATE appointment_measure1 SET s_collar='$s_collar_edit1',s_chest='$s_chest_edit1',s_sleeve_length='$s_sleeve_length_edit1',s_shoulder_length='$s_shoulder_length_edit1',s_cuff='$s_cuff_edit1',s_waist='$s_waist_edit1',s_shirt_length='$s_length_edit1',s_neck='$s_neck_edit1',t_ankle='$t_ankle_edit1',t_seat='$t_seat_edit1',t_hip='$t_hip_edit1',t_langot='$t_langot_edit1',t_zip='$t_zip_edit1',t_thai='$t_thai_edit1',t_pent_length='$t_length_edit1' WHERE ap_measure_id='$ap_id";
//            $result115=mysqli_query($conn,$sql115);
         

//            // $sql114="UPDATE appointment_measure1 SET s_collar='$s_collar_edit1',s_chest='$s_chest_edit1',s_sleeve_length='$s_sleeve_length_edit1',s_shoulder_length='$s_shoulder_length_edit1',s_cuff='$s_cuff_edit1',s_waist='$s_waist_edit1',s_shirt_length='$s_length_edit1',s_neck='$s_neck_edit1',t_ankle='$t_ankle_edit1',t_seat='$t_seat_edit1',t_hip='$t_hip_edit1',t_langot='$t_langot_edit1',t_zip='$t_zip_edit1',t_thai='$t_thai_edit1',t_pent_length='$t_length_edit1' WHERE ap_measure_id='$ap_id";
//            // $result114=mysqli_query($conn,$sql114);
//            if($result115){
//            	echo "success";
//             $_SESSION['status']="Your Data Is Update";
//             $_SESSION['status_code']="success";
//           //  echo "<script>location.href='appointment.php'</script>";
//            }
//            else{
//            	echo "error";
//             $_SESSION['status']="Your Data Is Not Update";
//             $_SESSION['status_code']="error";
//             // echo "<script>location.href='appointment.php'</script>";
//            }

           
          
//       }     


//----------------------------------appointment measure data edit update here--------------------------------------------


if(isset($_POST['ap_measure_updat'])){
          
          $ap_id=$_POST['ap_id'];
           $s_collar_edit1=$_POST['s_collar'];
           $s_chest_edit1=$_POST['s_chest'];
           $s_sleeve_length_edit1=$_POST['s_sleeve_length'];
           $s_shoulder_length_edit1=$_POST['s_shoulder_length'];
           $s_cuff_edit1=$_POST['s_cuff'];
           $s_waist_edit1=$_POST['s_waist'];
           $s_length_edit1=$_POST['s_length'];
           $s_neck_edit1=$_POST['s_neck'];
           $t_ankle_edit1=$_POST['t_ankle'];
           $t_seat_edit1=$_POST['t_seat'];
           $t_hip_edit1=$_POST['t_hip'];
           $t_langot_edit1=$_POST['t_langot'];
           $t_zip_edit1=$_POST['t_zip'];
           $t_thai_edit1=$_POST['t_thai'];
           $t_length_edit1=$_POST['t_length'];
           echo $s_collar_edit1;
           echo $ap_id;
           echo $s_chest_edit1;
           echo $s_sleeve_length_edit1;
           echo $s_shoulder_length_edit1;
           echo $s_cuff_edit1;
           echo $s_waist_edit1;
           echo $s_length_edit1;
           echo $s_neck_edit1;
           echo $t_ankle_edit1;
           echo $t_seat_edit1;
           echo $t_hip_edit1;
           echo $t_langot_edit1;
           echo $t_zip_edit1;
           echo $t_thai_edit1;
           echo $t_length_edit1;



           $sql116="UPDATE appointment_measure1 SET s_collar='$s_collar_edit1',s_chest='$s_chest_edit1',s_sleeve_length='$s_sleeve_length_edit1',s_shoulder_length='$s_shoulder_length_edit1',s_cuff='$s_cuff_edit1',s_waist='$s_waist_edit1',s_shirt_length='$s_length_edit1',s_neck='$s_neck_edit1',t_ankle='$t_ankle_edit1',t_seat='$t_seat_edit1',t_hip='$t_hip_edit1',t_langot='$t_langot_edit1',t_zip='$t_zip_edit1',t_thai='$t_thai_edit1',t_pent_length='$t_length_edit1' WHERE ap_measure_id='$ap_id'";
           $result116=mysqli_query($conn,$sql116);
      
           if($result116){
            $_SESSION['status']="Your Data Is Update";
            $_SESSION['status_code']="success";
            echo "<script>location.href='appointment.php'</script>";
           }
           else{
            $_SESSION['status']="Your Data Is Not Update";
            $_SESSION['status_code']="error";
            echo "<script>location.href='appointment.php'</script>";
           }
 }     



// -----------------------------delete appointment measure------------------------------------------------------------

if(isset($_POST['del'])){
	$appoint_measure_delid=$_POST['appoint_measure_delid'];
	$ap_measure_delid=$_POST['ap_measure_delid'];
	$sql117="DELETE FROM appointment_measure1 WHERE ap_measure_id='$ap_measure_delid'";
	$result117=mysqli_query($conn,$sql117);
	if($result117){
		$sql118="UPDATE appointment1 SET status='Pending' WHERE appoint_id='$appoint_measure_delid'";
		$result118=mysqli_query($conn,$sql118);
		if($result118){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:appointment.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:appointment.php");
	}
}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:appointment.php");
	}
}


// -----------------------------delete payment detail--------------------------------------------------------------------

if(isset($_POST['pay_delete_btn'])){
	$pay_delete_id=$_POST['pay_delete_id'];
	$sql119="DELETE FROM payment_master WHERE pay_id='$pay_delete_id'";
	$result119=mysqli_query($conn,$sql119);
	if($result119){
		$_SESSION['status']="Your Data Is Deleted";
		$_SESSION['status_code']="success";
		header("Location:payment.php");
	}
	else{
		$_SESSION['status']="Your Data Is Not Deleted";
		$_SESSION['status_code']="error";
		header("Location:payment.php");
	}
}



?>


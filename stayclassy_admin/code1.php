<?php

include "admindb.php";

if(isset($_POST['productsavebtn'])){
	$pro_name=$_POST['pro_name'];
	$pro_sub_cate=$_POST['pro_sub_cate'];
	$pro_price=$_POST['pro_price'];
	$pro_images=$_FILES['pro_images']['name'];
	$pro_qty=$_POST['pro_qty'];
	$pro_color=$_POST['pro_color'];
	$pro_desc=$_POST['pro_desc'];
	$target="upload/".basename($_FILES['pro_images']['name']);
	// echo $pro_name."<br>";
	// echo $pro_sub_cate."<br>";
	// echo $pro_price."<br>";
	// echo $pro_qty."<br>";
	// echo $pro_color."<br>";
	// echo $pro_desc."<br>";
	// echo $pro_images."<br>";
	// echo $target."<br>";

	//pro_name,pro_color,pro_price,description,pro_image,pro_qty)
	// ,'$pro_name','$pro_color','$pro_price','$pro_desc','$pro_images','$pro_qty'
	$sql105="INSERT INTO product_details (sub_cate_id) VALUES ('$pro_sub_cate')";
	$result105=mysqli_query($conn,$sql);
	if($result105){
		//move_uploaded_file($_FILES['pro_images']['tmp_name'],$target);
		$_SESSION['status']="Product added";
		$_SESSION['status_code']="success";
		
		header('Location:product.php');
		echo "success";
	}

	else
	{
		$_SESSION['status']="Product Not added";
 		$_SESSION['status_code']="error";
			
	 	 header('Location:product.php');
	 	 echo "failed";
	 }

	
	// $sql5="INSERT INTO product_master (sub_cate_id,pro_name,pro_color,pro_price,description,pro_image,pro_qty) VALUES ('$pro_sub_cate','$pro_name','$pro_color','$pro_price','$pro_desc','$pro_images','$pro_qty')";
	// $result5=mysqli_query($conn,$sql5);
	
	// 	if($result5){
	// 	move_uploaded_file($_FILES['pro_images']['tmp_name'],$target);
	// 	$_SESSION['status']="Product added";
	// 	$_SESSION['status_code']="success";
	// 	echo "success";
	// 	// header('Location:product.php');
	// }
	// else{
	// 	$_SESSION['status']="Product Not added";
	// 	$_SESSION['status_code']="error";
	// 	echo "failed";
	// 	// header('Location:product.php');
	// }
}

?>
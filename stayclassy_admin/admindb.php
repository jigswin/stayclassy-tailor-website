<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="stay classy final";
$db_port=3307;


$conn=mysqli_connect($db_host,$db_user,$db_password,$db_name,$db_port);

if(!$conn){
	die("connection failed");

}
// else{
// 	"connect";
// }
 // if($conn){
 // 	echo "connect";
 // }
?>
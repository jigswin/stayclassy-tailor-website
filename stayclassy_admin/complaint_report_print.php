<?php

include "admindb.php";
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
    </head>
    <body>
<h3 style="color:grey;font-weight: bold;margin-top: 5rem;"><center><u>COMPLAINT REPORT</u></center></h3>




<?php
if(isset($_POST['print_c_user'])){
  $from_date=$_POST['from_date'];
  $to_date=$_POST['to_date'];
  $status=$_POST['status'];
  if((isset($from_date)) || (isset($to_date))){

  
         if($status=='Pending'){
          $sql="SELECT * FROM contact_master WHERE c_status='Pending' AND cont_date between '$from_date' and '$to_date'  order by cont_date";
         }
         elseif($status=='Success'){
          $sql="SELECT * FROM contact_master WHERE c_status='Success' AND cont_date between '$from_date' and '$to_date' order by cont_date";
         }
         else{
          $sql="SELECT * FROM contact_master WHERE cont_date AND cont_date between '$from_date' and '$to_date' order by cont_date";
         }
  }
 
 
  
 

 
    
   
    $result=mysqli_query($conn,$sql);
?>
<div class="container" style="margin-top: 5rem;margin-left: -1.5rem;padding: 2rem">
  <div class="container">
<table class="table table-bordered"   width="100%" cellpadding="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th> EMAIL</th>
             <th>MOBILE NO.</th>
              <th>SUBJECT</th>
              <th>MESSAGE</th>
              <th>STATUS</th>
              <th>DATE</th>

            </tr>
          </thead>
          <tbody>
<?php
    if(mysqli_num_rows($result)>0){


      while($rows=mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <td><?php echo $rows['cont_id']; ?></td>
          <td><?php echo $rows['cont_name']; ?></td>
          <td><?php echo $rows['cont_email']; ?></td>
          <td><?php echo $rows['cont_mobile']; ?></td>

          <td><?php echo $rows['cont_subject']; ?></td>
          <td><?php echo $rows['cont_msg']; ?></td>
          <td><?php echo $rows['c_status']; ?></td>
          <td><?php echo $rows['cont_date']; ?></td>
        </tr>

        <?php

      }
    }
    else{
      echo "<tr><td colspan='8'><center>COMPLAINT NOT FOUND</center></td></tr>";
    }
?>

</tbody>
</table>
</div>
</div>




<?php
}
?>












<script type="text/javascript">
  window.print();
</script>

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
 
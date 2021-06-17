<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";
include "vendor/autoload.php";
include "admindb.php";

?>
<!DOCTYPE html>
<html>
<head>
  <title>www.thestayclassy.com</title>


 <!------ jqueryui.com cdn------------------------->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>

<div class="container-fluid">

  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary text-center">CUSTOMER DETAILS</h4>
    </div>
    <div class="card-body">
 <?php
//     if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
// 		  echo "<h4 class='text-white bg-primary p-2'>".$_SESSION['success']."</h4>";
// 		  unset($_SESSION['success']);
// }
//    if(isset($_SESSION['status']) && $_SESSION['status']!= ''){
// 	  echo "<h4 class='text-white bg-primary p-2'>".$_SESSION['status']."</h4>";
// 	  unset($_SESSION['status']);
// }
?>

<!-- <div> -->
  <!-- <form action="" method="POST">
    <div class="row mb-3"> 
      <div class="col-2">
  <label>FROM : </label>
  <input type="date" name="from" class="form-control">
</div>
<div class="col-2 ">
  <label>TO : </label>
  <input type="date" name="to" class="form-control">
</div>
<div class="col-2" style="top: 2rem">
 <button type="submit" name="go"  class="btn btn-success">Filter</button>
</div>

 </div> 
</form> -->




<!-- </div> -->
<!-- <form action="user_print.php" method="POST">
<button type="submit" class="btn btn-primary" style="position: relative;margin-left: 66rem;margin-top: -6rem" name="printdata">
 <i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD
</button> -->
<!-- </form> -->
      <div class="table-responsive">
     <!--  <nav aria-label="Page navigation example" class="mt-4 mb-4">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        
          <span style="position: relative; top:-2.7rem;left:65rem;">
          <select>
            <option>choose rows</option>
            <option>5</option>
            <option>10</option>
            <option>15</option>
          </select>
          </span>
    </nav> -->
        <?php
        
          
          $sql="SELECT * FROM user_master ";
          $result=mysqli_query($conn,$sql);

       ?>
        <table class="table table-bordered" id="dataTable"  width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>USER ID</td>
              <td>USERNAME</td>
              <td>EMAIL ADDRESS</td>
              <td>PASSWORD</td>
              <td>MOBILE NO.</td>
              <td>REGISTER DATE</td>
              <!-- <td>EDIT</td> -->
              <td>DELETE</td>
            </tr>
          </thead>
          <tbody>
            <?php
            //        if(isset($_POST['go'])){
            //             $from=$_POST['from'];
            //             $to=$_POST['to'];
                        
            //   $sql1="SELECT * FROM user_master WHERE register_date between '$from' AND '$to' order by register_date";
            //             $result1=mysqli_query($conn,$sql1);
            //             if(mysqli_num_rows($result1)>0){
            //               while($rows1=mysqli_fetch_assoc($result1)){
            //             $normaldata='<tr>
            //             <td>'.$rows1['u_id'].'</td>
            //             <td>'.$rows1['u_name'].'</td>
            //             <td>'.$rows1['email'].'</td>
            //             <td>'.$rows1['password'].'</td>
            //             <td>'.$rows1['mobile'].'</td>
            //             <td>'.$rows1['register_date'].'</td>


                        
            //             <td>
            //               <form action="userregister_edit.php" method="POST">
            //                 <input type="hidden" name="editid" value="'.$rows1['u_id'].'">
            //               <button type="submit" class="btn btn-success " name="editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            //               </form>
            //           </td>
            //           <td>
            //             <form action="code.php" method="POST">
            //               <input type="hidden" name="delete_id" value="'.$rows1['u_id'].'">
            //               <button type="submit" class="btn btn-primary" name="delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
            //             </form>
            //           </td>
            //           </tr>';
            //         echo $normaldata;   
            //       }      
            //   }
            // }
            // else
            // {

              if(mysqli_num_rows($result)){
                while($rows=mysqli_fetch_assoc($result)){
              
                       $normaldata='<tr>
                          <td>'.$rows['u_id'].'</td>
                          <td>'.$rows['u_name'].'</td>
                          <td>'.$rows['email'].'</td>
                          <td>'.$rows['password'].'</td>
                          <td>'.$rows['mobile'].'</td>
                          <td>'.$rows['register_date'].'</td>
                        
                        <td>
                          <form action="code.php" method="POST">
                            <input type="hidden" name="delete_id" value="'.$rows['u_id'].'">
                            <button type="submit" class="btn btn-danger" name="delete_btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                          </form>
                        </td>
                        </tr>';
            
              echo $normaldata;
                    //   <td>
                        //     <form action="userregister_edit.php" method="POST">
                        //       <input type="hidden" name="editid" value="'.$rows['u_id'].'">
                        //     <button type="submit" class="btn btn-success" name="editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        //     </form>
                        // </td>

            }
             }
              
          ?>

        

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!--- container fluid close------------->

 <!------ jqueryui.com cdn------------------------->
   
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>



<?php

include "includes/footer.php";

?>
</body>
</html>
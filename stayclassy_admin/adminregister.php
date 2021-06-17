<?php
session_start();
if(!$_SESSION['username']){
    header("Location:login.php");
    exit();
}
include "includes/header.php";


?>


<!-- Button trigger modal -->
 

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>


      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
       <div class="form-group">
         <label> USERNAME*</label>
         <input type="text" name="username" class="form-control" placeholder="Enter Username" Required>
       </div>
       <div class="form-group">
         <label> EMAIL ADDRESS*</label>
         <input type="email" name="email" class="form-control check_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Enter Email Address" Required>
         <small class="error_email" style="color: red"></small>
       </div>
       <div class="form-group">
         <label> PASSWORD*</label>
         <input type="password" name="password" class="form-control checkpass" placeholder="Enter Password" Required>
         <small class="error_pass" style="color: red"></small>
       </div>
       <div class="form-group">
         <label> CONFIRM PASSWORD*</label>
         <input type="password" name="cpassword" class="form-control" placeholder="Enter Confirm Password" Required>
       </div>
       <div class="form-group">
         <label> MOBILE NO.*</label>
         <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" Required>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="registerbtn">Save </button>
      </div>
    </form>
    </div>
  </div>
</div> 






<div class="container-fluid">

  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary text-left">Admin Profile
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 53rem">Add Admin Profile</button>
       
      </h4>
    </div>
    <div class="card-body">




      <div class="table-responsive">
        <?php
        include "admindb.php";
          $sql="SELECT * FROM admin_master";
          $result=mysqli_query($conn,$sql);

        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
          <thead>
            <tr>
              <td>ID</td>
              <td>USERNAME</td>
              <td>EMAIL ADDRESS</td>
              <td>PASSWORD</td>
              <td>MOBILE NO.</td>
              <td>EDIT</td>
              <td>DELETE</td>
            </tr>
          </thead>
          <tbody>
            <?php
              if(mysqli_num_rows($result)){
                while($rows=mysqli_fetch_array($result)){
                ?>
               
               
            <tr>
              <td><?php echo $rows['id']; ?></td>
              <td><?php echo $rows['username']; ?></td>
              <td><?php echo $rows['email']; ?></td>
              <td><?php echo $rows['password']; ?></td>
              <td><?php echo $rows['mobile']; ?></td>
              <td>
                <form action="adminregister_edit.php" method="POST">
                  <input type="hidden" name="editid" value="<?php echo $rows['id']; ?>">
                <button type="submit" class="btn btn-success " name="editbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </td>
            <td>
              <form action="code.php" method="POST">
                
               <input type="hidden" name="deleteid" value="<?php echo $rows['id']; ?>">
                
                <button type="submit" class="btn btn-danger" name="deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </form>
            </td>
            </tr>

              <?php
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







<script src="js\jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.check_email').keyup(function (e) {
      var emailjs=$('.check_email').val();
      $.ajax({
        type:"POST",
        url:"code.php",
        data :{
          "check_submit_btn":1,
          "email_id":emailjs,
        },
        success:function (response){
          // alert(response);
          $('.error_email').text(response);
        }
      });
    });

    $('.checkpass').keyup(function (e) {
      var passjs=$('.checkpass').val();
      $.ajax({
        type:"POST",
        url:"code.php",
        data :{
          "check_submit_btn1":2,
          "password":passjs,
        },
        success:function (response){
          // alert(response);
          $('.error_pass').text(response);
        }
      });
    });

  });

</script>

<?php

include "includes/footer.php";

?>
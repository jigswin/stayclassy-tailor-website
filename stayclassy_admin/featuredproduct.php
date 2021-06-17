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
        <h5 class="modal-title" id="exampleModalLabel">Add Featured Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>


      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
       <div class="form-group">
         <label> CATEGORY NAME*</label>
         <input type="text" name="" class="form-control" placeholder="Enter Category Name">
       </div>
       <div class="form-group">
         <label> DESCRIPTION*</label>
         <input type="text" name="" class="form-control" placeholder="Enter Category Description">
       </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="">Save </button>
      </div>
    </div>
    </form>
    </div>
  </div>
</div> 


<div class="container-fluid">

  <!--- data table example------------>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Featured Product
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Featured Product</button>
       
      </h6>
    </div>
    </div>

<br>
<br>
<br>
<br>
<br>
<br><br><br>
<br>
<br>
<br><br>
<br>
<br><br><br><br>

<?php

include "includes/footer.php";

?>
<!--Header and Sidebar of Admin dashboard start from here-->
<?php
if(!isset($_SESSION)){
    session_start();
}
include('./header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminemail = $_SESSION['adminemail'];
}else {
    echo "<script>location.href='../index.php';</script>";
}

if(isset($_REQUEST['newuserSubmitBtn'])){

    //checking for empty fields
    if(($_REQUEST['user_name']=="") || ($_REQUEST['user_email']=="") || ($_REQUEST['user_password']=="")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $user_name = $_REQUEST['user_name'];
        $user_email = $_REQUEST['user_email'];
        $user_password = $_REQUEST['user_password'];
        
        $sql = "INSERT INTO user (user_name, user_email, user_password) VALUES ('$user_name', '$user_email', '$user_password')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">User Add Succesfully</div>'; 
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add User</div>';
        }
    }
}

?>
<!--Header and Sidebar of Admin dashboard End here-->

<!--Content-->
<div class="col-sm-6 mt-5 mx-3 jumnotron">
    <h3 class="text-center">Add New User</h3>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
          <label for="user_name">Name</label>
          <input type="text" class="form-control" id="user_name" name="user_name">
      </div>
      <div class="form-group">
          <label for="user_email">Email</label>
          <input type="text" class="form-control" id="user_email" name="user_email">
      </div>
      <div class="form-group">
          <label for="user_password">Password</label>
          <input type="text" class="form-control" id="user_password" name="user_password">
      </div>
      <div class="text-center">
          <button type="submit" class="btn btn-danger" id="newuserSubmitBtn" name="newuserSubmitBtn">Submit</button>
          <a href="user.php" class="btn btn-secondary">Close</a>
      </div>
      <?php 
      if(isset($msg)) {echo $msg;}
      ?>
    </form>
</div>
</div><!--div row close from header-->
</div><!--div container-fluid close from header -->

<!--Footer start-->
<?php
include('./footer.php');
?>
    <!--.Footer End-->
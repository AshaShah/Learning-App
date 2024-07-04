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

//<!--Header and Sidebar of Admin dashboard End here-->

//Update
if(isset($_REQUEST['requpdate'])){
//checking for empty fields
if(($_REQUEST['user_id']=="") || ($_REQUEST['user_name']=="") || ($_REQUEST['user_email']=="") || ($_REQUEST['user_password']=="")){
    //msg display if required filed missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
}else{
    //Assigning user values to variable
    $cid = $_REQUEST['user_id'];
    $cname = $_REQUEST['user_name'];
    $cemail = $_REQUEST['user_email'];
    $cpassword = $_REQUEST['user_password'];

    $sql = "UPDATE user SET user_id='$cid', user_name='$cname', user_email='$cemail', user_password='$cpassword'  WHERE user_id = '$cid'";
    if($conn->query($sql) == TRUE){
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Succesfully</div>'; 
    }else{
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to update</div>';
    }
}
}
?>

<!--Content-->
<div class="col-sm-6 mt-5 mx-3 jumnotron">
    <h3 class="text-center">Update User Detail</h3>
    
    <?php 
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM user WHERE user_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
          <label for="user_id">ID</label>
          <input type="text" class="form-control" id="user_id" name="user_id" value="<?php if(isset($row['user_id'])) {echo $row['user_id'];} ?>" readonly>
      </div>
      <div class="form-group">
          <label for="user_name">Name</label>
          <small style="color:red;">(*Only Alphaneumeric value*)</small>
          <input type="text" class="form-control" id="user_name" name="user_name" value="<?php if(isset($row['user_name'])) {echo $row['user_name'];} ?>">
      </div>
      <div class="form-group">
          <label for="user_email">Email</label>
          <small style="color:red;">(*example@something.com*)</small>
          <input type="text" class="form-control" id="user_email" name="user_email" value="<?php if(isset($row['user_email'])) {echo $row['user_email'];} ?>">
      </div>
      <div class="form-group">
          <label for="user_password">Password</label>
          <small style="color:red;">(*Only Alphaneumeric value*)</small>
          <input type="text" class="form-control" id="user_password" name="user_password" value="<?php if(isset($row['user_password'])) {echo $row['user_password'];} ?>">
      </div>
      <div class="text-center">
          <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Submit</button>
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
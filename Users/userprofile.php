<?php
if(!isset($_SESSION)){
    session_start();
}
include('./header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])){
    $logemail = $_SESSION['logemail'];
}else {
    echo "<script>location.href='../index.php';</script>";
}
$sql = "SELECT * FROM user WHERE user_email='$logemail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $user_id = $row["user_id"];
    $user_name = $row["user_name"];
    $user_img = $row["user_img"];
}

if(isset($_REQUEST['updateuserNameBtn'])){

    //checking for empty fields
    if(($_REQUEST['user_name']=="") ){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $user_name = $_REQUEST['user_name'];
        $user_img = $_FILES['user_img']['name'];
        $user_img_temp = $_FILES['user_img']['tmp_name'];
        $img_folder='../image/user/'.$user_img;
        move_uploaded_file($user_img_temp, $img_folder);
        $sql = "UPDATE user SET user_name='$user_name', user_img = '$img_folder' WHERE user_email = '$logemail'";
        if($conn->query($sql) == TRUE){
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Updated Succesfully</div>'; 
        }else{
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}

?>
<!--Content-->
<div class="col-sm-6 mt-5 ">
  <form class="mx-5" method="POST" enctype="multipart/form-data">
    <div class="form-group">
          <label for="user_id">User ID</label>
          <input type="text" class="form-control" id="user_id" name="user_id" value="<?php if(isset($row['user_id'])) {echo $row['user_id'];} ?>" readonly>
    </div>
    <div class="form-group">
          <label for="user_email">Email</label>
          <input type="email" class="form-control" id="user_email" name="user_email" value="<?php if(isset($row['user_email'])) {echo $row['user_email'];} ?>" readonly>
      </div>  
    <div class="form-group">
          <label for="user_name">Name</label>
          <input type="text" class="form-control" id="user_name" name="user_name" value="<?php if(isset($row['user_name'])) {echo $row['user_name'];} ?>">
      </div>
      <div class="form-group">
          <label for="user_img">Upload Image</label>
          <input type="file" class="form-control-file" id="user_img" name="user_img">
      </div>
      <div class="text-center">
          <button type="submit" class="btn btn-danger" id="updateuserNameBtn" name="updateuserNameBtn">Update</button>
        </div>
      <?php 
      if(isset($passmsg)) {echo $passmsg;}
      ?>
    </form>
</div>
</div><!--div row close from header-->
<?php
include('./footer.php');
?>
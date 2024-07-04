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
if(($_REQUEST['course_id']=="") || ($_REQUEST['course_name']=="") || ($_REQUEST['course_author']=="") || ($_REQUEST['course_desc']=="") || ($_REQUEST['course_duration']=="")){
    //msg display if required filed missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
}else{
    //Assigning user values to variable
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['course_name'];
    $cauthor = $_REQUEST['course_author'];
    $cdesc = $_REQUEST['course_desc'];
    $cduration = $_REQUEST['course_duration'];
    $cimg = $_FILES['course_img']['name'];
    $cimg_temp = $_FILES['course_img']['tmp_name'];
    $img_folder='../image/courseimg/'.$cimg;
    move_uploaded_file($cimg_temp, $img_folder);

    $sql = "UPDATE course SET course_id='$cid', course_name='$cname', course_author='$cauthor', course_desc='$cdesc', course_duration='$cduration', course_img='$img_folder' WHERE course_id = '$cid'";
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
    <h3 class="text-center">Edit course</h3>
    
    <?php 
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
          <label for="course_id">Course ID</label>
          <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) {echo $row['course_id'];} ?>" readonly>
      </div>  
    <div class="form-group">
          <label for="course_name">Course Name</label>
          <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])) {echo $row['course_name'];} ?>">
      </div>
      <div class="form-group">
          <label for="course_name">Course Author</label>
          <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($row['course_author'])) {echo $row['course_author'];} ?>">
      </div>
      <div class="form-group">
          <label for="course_desc">Course Description</label>
          <textarea class="form-control" id="course_desc" name="course_desc" row=2><?php if(isset($row['course_desc'])) {echo $row['course_desc'];} ?></textarea>
      </div>
      <div class="form-group">
          <label for="course_duration">Course Duration</label>
          <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($row['course_duration'])) {echo $row['course_duration'];} ?>">
      </div>
      <div class="form-group">
          <label for="course_img">Course Image</label>
          <img src="<?php if(isset($row['course_img'])) {echo $row['course_img'];} ?>" alt="" class="img-thumbnail">
          <input type="file" class="form-control-file" id="course_img" name="course_img">
      </div>
      <div class="text-center">
          <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
          <a href="course.php" class="btn btn-secondary">Close</a>
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
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

if(isset($_REQUEST['courseSubmitBtn'])){

    //checking for empty fields
    if(($_REQUEST['course_name']=="") || ($_REQUEST['course_author']=="") || ($_REQUEST['course_desc']=="") || ($_REQUEST['course_duration']=="")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $course_name = $_REQUEST['course_name'];
        $course_author = $_REQUEST['course_author'];
        $course_desc = $_REQUEST['course_desc'];
        $course_duration = $_REQUEST['course_duration'];
        $course_img = $_FILES['course_img']['name'];
        $course_img_temp = $_FILES['course_img']['tmp_name'];
        $img_folder='../image/courseimg/'.$course_img;
        move_uploaded_file($course_img_temp, $img_folder);
        $sql = "INSERT INTO course (course_name, course_author, course_desc, course_duration, course_img) VALUES ('$course_name', '$course_author', '$course_desc', '$course_duration', '$img_folder')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Add Succesfully</div>'; 
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Add Course</div>';
        }
    }
}

?>
<!--Header and Sidebar of Admin dashboard End here-->

<!--Content-->
<div class="col-sm-6 mt-5 mx-3 jumnotron">
    <h3 class="text-center">Add New course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
          <label for="course_name">Course Name</label>
          <input type="text" class="form-control" id="course_name" name="course_name">
      </div>
      <div class="form-group">
          <label for="course_author">Course Author</label>
          <input type="text" class="form-control" id="course_author" name="course_author">
      </div>
      <div class="form-group">
          <label for="course_desc">Course Description</label>
          <textarea class="form-control" id="course_desc" name="course_desc" row=2></textarea>
      </div>
      <div class="form-group">
          <label for="course_duration">Course Duration</label>
          <input type="text" class="form-control" id="course_duration" name="course_duration">
      </div>
      <div class="form-group">
          <label for="course_img">Course Image</label>
          <input type="file" class="form-control-file" id="course_img" name="course_img">
      </div>
      <div class="text-center">
          <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
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
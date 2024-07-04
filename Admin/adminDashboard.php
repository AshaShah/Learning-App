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
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$totaluser = $result->num_rows;
?>
<!--Header and Sidebar of Admin dashboard End here-->

        <div class="col-sm-9 mt-5">
            <div class="row mx-5 text-center">
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
                      <div class="card-header">Courses</div>
                      <div class="card-body">
                          <h4 class="card-title"><?php echo $totalcourse; ?></h4>
                          <a class="btn text-white " href="course.php">View</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3" style="max-width:18rem;">
                      <div class="card-header">Users</div>
                      <div class="card-body">
                          <h4 class="card-title"><?php echo $totaluser; ?></h4>
                          <a class="btn text-white " href="user.php">View</a>
                      </div>
                    </div>
                </div>
            </div>
            <!--cource  order table started-->

            <!--Up to here course table -->
        </div>
      </div><!--div row close from header-->
    </div><!--div container-fluid close from headre-->

<!--Footer start-->
<?php
include('./footer.php');
?>
    <!--.Footer End-->

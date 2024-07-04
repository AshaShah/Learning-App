<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])){
    $logemail = $_SESSION['logemail'];
}else {
    echo "<script>location.href='../index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title>Watch Course</title>
</head>
<body>
    <div class="container-fluid bg-dark p-2">
        <h3 style="color:white;">Welcome To Spiralogics Training</h3>
        <a class="btn btn-danger" href="../course.php">Courses</a>
    </div>

    <div Class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php 
                    if(isset($_GET['course_id'])){
                        $course_id = $_GET['course_id'];
                        $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo '<li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' style="cursor: pointer;">'. $row['lesson_name'] . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div>

<!--Footer start-->
    <!--Jquery and Bootstrap javascript-->
    <script  type="text/javascript" src="../js/jquery.min.js"></script>
    <script  type="text/javascript" src="../js/popper.min.js"></script>
    <script  type="text/javascript" src="../js/bootstrap.min.js"></script>

    <!--font Awesome JS-->
    <script  type="text/javascript" src="../js/all.min.js"></script>

    <!--Admin Ajax Call Javascript-->
    <script  type="text/javascript" src="../js/adminajaxrequest.js"></script>

    <!--Custom JavaScript-->
    <script  type="text/javascript" src="../js/custom.js"></script>

</body>
</html>
<!--.Footer End-->
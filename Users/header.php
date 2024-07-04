<?php
include_once('../dbConnection.php');

if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['is_login'])){
    $logemail = $_SESSION['logemail'];
}
//else {
//    echo "<script>location.href='../index.php';</script>";
//}
if(isset($logemail)){
    $sql = "SELECT user_img FROM user WHERE user_email='$logemail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user_img = $row['user_img'];    
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

    <title>Profile</title>

</head>

<body>
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow bg-dark">
      <a class="navbar-brand col-sm-3 col-md-2 mr=0" href="../index.php">Spiralogics training</a>
    </nav>

    <!--Side Bar-->
    <div class="container-fluid mb-5" style="margin-top:40px;">
      <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3"> <img src="<?php echo $user_img ?>" alt="Userimage" class="img-thumbnail rounded-circle"></li>
                    <li class="nav-item"><a class="nav-link <?php if("PAGE" == 'profile'){echo 'active';} ?>" href="userprofile.php"><i class="fas fa-user"></i>Profile<span class="sr-only">(currently)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="myCourse.php"><i class="fas fa-book"></i>My Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="userfeedback.php"><i class="fas fa-comments"></i>Feedback</a></li>
                    <li class="nav-item"><a class="nav-link" href="userChangePass.php"><i class="fas fa-key"></i>Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                </ul>
            </div>
        </nav>
        <!--Header and Sidebar of User dashboard End here-->
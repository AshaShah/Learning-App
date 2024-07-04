<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Spiralogics_Training</title>
</head>

<body>
    <!-- Start Navigation Portion -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark px-5 fixed-top">
      <a class="navbar-brand" href="index.php">Spiralogics Training</a>
      <span class="navbar-text">Learn and Implement</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>  
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-center custom-nav px-5">
                <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item"><a href="course.php" class="nav-link">Courses</a></li>
                
                <?php
                session_start();
                if(isset($_SESSION['is_login'])){
                  echo '<li class="nav-item custom-nav-item"><a href="Users/userprofile.php" class="nav-link">My Profile</a></li>
                        <li class="nav-item custom-nav-item"><a href="Training/story.html" class="nav-link">Phising Training</a></li>
                        <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                } else{
                  echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#loginModalCenter">Login</a></li>
                        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#signupModalCenter">SignUp</a></li>';
                }
                ?>

               <!-- <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
                    <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>-->
            </ul>
        </div>  
    </nav>
    <!-- End of Navigation section -->

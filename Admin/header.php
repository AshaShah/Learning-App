<!--Header and Sidebar of Admin dashboard start from here-->
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

    <title>Dashboard</title>

</head>

<body>
    <nav class="navbar navbar-dark fixed-top px-5 bg-dark">
      <a class="navbar-brand col-sm-3 col-md-2 mr=0" href="adminDashboard.php">Spiralogics training
          <small class="text-white">Admin Area</small>
      </a>
    </nav>

    <!--Side Bar-->
    <div class="container-fluid mb-5" style="margin-top:40px;">
      <div class="row">
        <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="adminDashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="course.php"><i class="fas fa-book"></i>Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="lesson.php"><i class="fas fa-book"></i>Lessons</a></li>
                    <li class="nav-item"><a class="nav-link" href="user.php"><i class="fas fa-users"></i>Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminfeedback.php"><i class="fas fa-comments"></i>Feedback</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminChangePass.php"><i class="fas fa-key"></i>Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                </ul>
            </div>
        </nav>
        <!--Header and Sidebar of Admin dashboard End here-->
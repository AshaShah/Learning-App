<!--Start of header and navigation part-->
<?php
include('./MainInclude/header.php');
include('./dbConnection.php');
?>
<!--End of header and navigation part-->

<!-- Started Backgound and content-->
    <div class="container-fluid remove-vid-margin">
        <!--Start video background-->
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
        <source src="video/background.mp4">
      </video>
        </div>
        <!--End of Video background-->

        <!--Welcome , learn and get started-->
        <div class="vid-content">
            <h1 class="my-content">Welcome to Training Section</h1><br>
            <?php
            if(!isset($_SESSION['is_login'])){
                echo '<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#signupModalCenter">Get Started</a>';
            } else {
                echo '<a href="Users/userprofile.php" class="btn btn-primary mt-3">My Profile</a>';
            }
            ?>
            
        </div>
    </div>
<!--End of background and Content-->

<!--Start Text Banner-->
    <!--<div class="container-fluid bg-red text-banner"></div>-->
<!--End of Text Banner-->

<!--Start Courses-->
    <div class="container mt-5">
        <h1 class="text-center">Courses</h1>
        <!--Start courses 1st card deck-->
        <div class="card-deck mt-4">
            <?php 
            $sql = "SELECT * FROM course LIMIT 3";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $course_id = $row['course_id'];
                    echo'
                    <a href="coursedetails.php?course_id='.$row['course_id'].'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                    <div class="card">
                        <img src="'.str_replace('..', '.', $row['course_img']).'" class="Card-img-top" alt="Image" />
                        <div class="card-body">
                            <h5 class="card-title">'.$row['course_name'].'</h5>
                            <p class="card-text">'.$row['course_desc'].'</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary text-white front-weight-bolder float-right" href="coursedetails.php?course_id='.$row['course_id'].'">Start</a>
                        </div>
                    </div>
                    </a>
                    ';
                }
            }
            ?>

        </div><br>
        <!--End 1st card deck-->

        <!--Start second Deck-->
        <div class="card-deck mt-4">
            <?php 
            $sql = "SELECT * FROM course LIMIT 3, 3";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $course_id = $row['course_id'];
                    echo'
                    <a href="coursedetails.php?course_id='.$row['course_id'].'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                    <div class="card">
                        <img src="'.str_replace('..', '.', $row['course_img']).'" class="Card-img-top" alt="Image" />
                        <div class="card-body">
                            <h5 class="card-title">'.$row['course_name'].'</h5>
                            <p class="card-text">'.$row['course_desc'].'</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary text-white front-weight-bolder float-right" href="coursedetails.php?course_id='.$row['course_id'].'">Start</a>
                        </div>
                    </div>
                    </a>
                    ';
                }
            }
            ?>

        </div><br>
        <!--End of Second Deck-->

        <div class="text-center m-2">
            <a class="btn btn-danger btn-sm" href="course.php">View All Courses</a>
        </div>

    </div>
    <!--Course End here-->

    <!--Start of Contact us-->
    <?php
    include('./contact.php')
    ?>
    <!--End Contact us--> 

    <!--Start social site link, About us, footer and Forms of registration and logins-->
    <?php
    include('./MainInclude/footer.php')
    ?>
    <!--End social site link, About us and footer and Forms of registration and logins-->
    
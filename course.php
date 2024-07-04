<!--Start of header part-->
<?php
include('./dbConnection.php');
include('./MainInclude/header.php');
?>
<!--End of header part-->

<!--Start Course page banner-->
<div class="container-fluid bg-dark">
    <div class="row">
      <img src="./image/coursebg.jpg" alt="Courses" style="height:500px; width:100%; object-fit:covers; box-shadow:10px;" />
    </div>

</div><br>
<!--End Course page banner-->

<!--Start Courses-->
<div class="container mt-5">
        <h1 class="text-center">All Courses</h1><br>
        <div class="row mt-4">
            <?php 
            $sql = "SELECT * FROM course";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $course_id = $row['course_id'];
                    echo'
                    <div class="col-sm-4 mb-4">
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
                    </div>
                    ';
                }
            }
            ?>

        </div><br> 
</div><br><br>
<!--Course End here-->


<!--Start of footer part-->
<?php
include('./MainInclude/footer.php')
?>
<!--End of footer part-->
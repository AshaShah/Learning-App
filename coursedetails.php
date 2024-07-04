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

<!--Contents start-->

<div class="container mt-5">
  
    <?php 
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }
    ?>
    <div class="row">   
        <div class="col-md-4">
            <img src="<?php echo str_replace('..', '.', $row['course_img']) ?>" class="card-img-top" alt="image"/> 
        </div>
        <div class="col-md-8">
            <div clas="card-body">
                <h5 class="card-title">Course Name:<?php echo $row ['course_name'] ?></h5>
                <p class="card-text">Description: <?php echo $row['course_desc']?></p>
                <p class="card-text">Duration: <?php echo $row['course_duration']?></p>
                <form action="Startlearn.php" method="POST">

                    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="start">Watch Now</button>
                </form>
            </div>
        </div>    
    </div><br>

    <div class="container">
        <div class="row">
        <table class="table table-boardered table-hover">
        <thead>
            <tr>
                <th scope="col">Lesson No.</th>
                <th scope="col">Lesson Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM lesson"; 
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if($result->num_rows > 0){
                    $num = 0;
                    while($row = $result->fetch_assoc()){
                       if($course_id == $row['course_id']){
                        $num++;
                        echo  '<tr>
                        <th scope="row">'.$num.'</th>
                        <td>'.$row['lesson_name'].'</td>
                        </tr>';
                       }
                    }
                }
            ?>
            


                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Contents Ends-->

<!--Start of footer part-->
<?php
include('./MainInclude/footer.php')
?>
<!--End of footer part-->
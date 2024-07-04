<?php
if(!isset($_SESSION)){
    session_start();
}
include('./header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])){
    $logemail = $_SESSION['logemail'];
}else {
    echo "<script>location.href='../index.php';</script>";
}
?>
<div class="container mt-5 ml-4">
    <div class="row">
        <h4 class="text-center">All Course</h4>
        <?php 
        if(isset($logemail)){
            $sql = "SELECT * FROM course";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){ ?>
                  <div class="bg-light mb-3">
                      <h5 class="card-header"><?php echo $row['course_name']; ?></h5>
                      <div class="row">
                          <div class="col-sm-3">
                              <img src="<?php echo $row['course_img']; ?>" class="card-img-top mt-4" alt="pic">
                          </div>
                          <div class="col-sm-6 mb-3">
                              <div class="card-body">
                                  <p class="card-title"><?php echo $row['course_desc']; ?></p>
                                  <small class="card-text">Description: <?php echo $row['course_desc']; ?></small><br />
                                  <small class="card-text">Intructor: <?php echo $row['course_author']; ?></small><br />
                                  <a href="http:watchcourse.php?course_id=<?php echo $row['course_id'] ?>" class="btn btn-primary mt-5 float-right">Watch Course</a>
                              </div>
                          </div>
                      </div>
                  </div>
                <?php  
            }
            }
        }
        ?>
        <hr />
    </div>
</div>
</div>
</div>

<?php
include('./footer.php');
?>
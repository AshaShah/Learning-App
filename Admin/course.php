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
?>
<!--Header and Sidebar of Admin dashboard End here-->
        <!--Content of courese start -->
  <div class="col-sm-9 mt-5">
    <!--Table-->
    <p class="bg-dark text-white p-2">List of Courses</p>
    <?php
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    ?>
    <table class="table" >
        <thread>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thread>
        <tbody>
            <?php while($row = $result->fetch_assoc()){ 
            echo '<tr>';
                echo '<th scope="row">'.$row['course_id'].'</th>';
                echo '<td>'.$row['course_name'].'</td>';
                echo '<td>'.$row['course_author'].'</td>';
                echo '<td>';
                echo '
                    <form action="editcourse.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                      <button
                        type="submit"
                        class="btn btn-info mr-3"
                        name="view"
                        value="View"><i class="fas fa-edit"></i>
                      </button>
                    </form>
                    
                    <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                    <button
                      type="submit"
                      class="btn btn-secondary"
                      name="delete"
                      value="Delete"
                    ><i class="fas fa-trash-alt"></i>
                    </button>
                    </form>
                    </td>
                </tr>';
            } ?>
        </tbody>
    </table>  
    <?php } else {
        echo "0 Result";
    }
    
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        }else {
            echo "Unable to Delete Data";
        }
    }
    
    ?>
  </div>
</div><!--div row close from header-->
<div>
    <a class="btn btn-danger box" href="./addcourse.php"><i class="fas fa-plus-square"></i></a>
</div>
</div><!--div container-fluid close from header-->
<!--Content of course end here-->

<!--Footer start-->
<?php
include('./footer.php');
?>
    <!--.Footer End-->
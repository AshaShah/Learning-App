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
$sql = "SELECT * FROM user WHERE user_email='$logemail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $user_id = $row["user_id"];
}

if(isset($_REQUEST['submitFeedbackBtn'])){
    //checking for empty fields
    if(($_REQUEST['f_content']=="")) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $f_content = $_REQUEST["f_content"];
        $sql = "INSERT INTO feedback (f_content, user_id) VALUES ('$f_content', '$user_id')";
           if($conn->query($sql)==TRUE){
                //below msg display on form submit success
                $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Submitted Successfully</div>';
            }else {
                //below msg display on form submit failed
                $passmsg='<div class="alert alert-dabger col-sm-6 ml-5 mt-2" role="alert">Submit Failed</div>';
            }
    }
}


?>

<!--Content-->
<div class="col-sm-9 mt-5">
        <form class="mx-5" method="POST" enctype="multipart/form-data">
           <div class="form-group">
                <label for="user_id">User Id</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="<?php if(isset($user_id)){echo $user_id;} ?>" readonly>
            </div>    
            <div class="form-group">
                <label for="f_content">Write Feedback: </label>
                <textarea class="form-control" id="f_content" name="f_content" row=2 ></textarea>
            </div>
            <button type="submit" class="btn btn-danger mr-4 mt-4" name="submitFeedbackBtn">Submit</button>
                        
            <?php 
            if(isset($passmsg)) {echo $passmsg;}
            ?>
        </form>
</div>
</div><!--div row close from header-->

<!--Footer start-->
<?php
include('./footer.php');
?>
    <!--.Footer End-->
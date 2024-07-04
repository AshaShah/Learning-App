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
    $user_name = $row["user_name"];
    $user_img = $row["user_img"];
}


$logemail = $_SESSION['logemail'];
if(isset($_REQUEST['userpassUpdatebtn'])){
    //checking for empty fields
    if(($_REQUEST['userpass']=="")) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $sql = "SELECT * FROM user WHERE user_email='$logemail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $userpass = $_REQUEST['userpass'];
            $sql = "UPDATE user SET user_password = '$userpass' WHERE user_email='$logemail'";
            if($conn->query($sql)==TRUE){
                //below msg display on form submit success
                $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
            }else {
                //below msg display on form submit failed
                $passmsg='<div class="alert alert-dabger col-sm-6 ml-5 mt-2" role="alert">Update Unsuccessful</div>';
            }
        }
    }
}


?>

<!--Content-->
<div class="col-sm-9 mt-5">
    <div class="row">
      <div class="col-sm-6">
        <form class="mt-5 mx-5">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" value="<?php echo $logemail ?>" readonly>
            </div>
            <div class="form-group">
                <label for="inputpassword"> New Password</label>
                <small style="color:red;">(*Only Alphaneumeric value*)</small>
                <input type="text" class="form-control" id="inputnewpassword" name="userpass">
            </div>
            
            <button type="submit" class="btn btn-danger mr-4 mt-4" name="userpassUpdatebtn">Update</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            
            <?php 
            if(isset($passmsg)) {echo $passmsg;}
            ?>
        </form>
      </div>
    </div>
</div>
</div><!--div row close from header-->
</div><!--div container-fluid close from header -->


<!--Footer start-->
<?php
include('./footer.php');
?>
    <!--.Footer End-->
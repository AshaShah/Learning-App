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
$adminemail = $_SESSION['adminemail'];
if(isset($_REQUEST['adminPassUpdatebtn'])){
    //checking for empty fields
    if(($_REQUEST['adminPass']=="")) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $sql = "SELECT * FROM admin WHERE admin_email='$adminemail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $adminPass = $_REQUEST['adminPass'];
            $sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email='$adminemail'";
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
<!--Header and Sidebar of Admin dashboard End here-->
    
<!--Content-->
<div class="col-sm-9 mt-5">
    <div class="row">
      <div class="col-sm-6">
        <form class="mt-5 mx-5">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" value="<?php echo $adminemail ?>" readonly>
            </div>
            <div class="form-group">
                <label for="inputpassword"> New Password</label>
                <small style="color:red;">(*Only Alphaneumeric value*)</small>
                <input type="text" class="form-control" id="inputnewpassword" name="adminPass">
            </div>
            
            <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdatebtn">Update</button>
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
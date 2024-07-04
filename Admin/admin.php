<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');
//Admin Login Verification
if (!isset($_SESSION['is_admin_login'])){
  if(isset($_POST['checkadminemail']) && isset($_POST['adminemail']) && isset($_POST['adminpwd'])){
    $adminemail = $_POST['adminemail'];
    $adminpwd = $_POST['adminpwd'];
    $sql = "SELECT admin_email, admin_pass FROM admin WHERE admin_email = '".$adminemail."' AND admin_pass = '".$adminpwd."' ";
    $result = $conn->query($sql);

    $row = $result->num_rows;

    if($row === 1){
        
        $_SESSION['is_admin_login'] = true;
        $_SESSION['adminemail'] = $adminemail;
        echo json_encode($row);
    }else if($row === 0){
        echo json_encode($row);
    }
  }
}
?>
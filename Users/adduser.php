<?php
if(!isset($_SESSION)){
    session_start();
}

include_once('../dbConnection.php');

//chceking email already registered
if(isset($_POST['checkemail']) && isset($_POST['regemail'])){
    $regemail = $_POST['regemail'];
    $sql = "SELECT user_email FROM user WHERE user_email = '".$regemail."' ";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

//insert student
if(isset($_POST['regsignup']) && isset($_POST['reguname']) && isset($_POST['regemail']) && isset($_POST['regpwd'])){
    $reguname = $_POST['reguname'];
    $regemail = $_POST['regemail'];
    $regpwd = $_POST['regpwd'];

    $sql = "INSERT INTO User(user_name, user_email, user_password) VALUES ('$reguname', '$regemail', '$regpwd')";
    if($conn->query($sql) == TRUE){
        echo json_encode("OK");
    }
    else {
        echo json_encode("Failed");
    }
}

//User Login Verification
if (!isset($_SESSION['is_login'])){
  if(isset($_POST['checkLogemail']) && isset($_POST['logemail']) && isset($_POST['logpwd'])){
    $logemail = $_POST['logemail'];
    $logpwd = $_POST['logpwd'];
    $sql = "SELECT user_email, user_password FROM user WHERE user_email = '".$logemail."' AND user_password = '".$logpwd."' ";
    $result = $conn->query($sql);

    $row = $result->num_rows;

    if($row === 1){
        
        $_SESSION['is_login'] = true;
        $_SESSION['logemail'] = $logemail;
        echo json_encode($row);
    }else if($row === 0){
        echo json_encode($row);
    }
  }
}
?>
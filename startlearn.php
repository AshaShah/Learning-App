<?php
include('./dbConnection.php');
session_start();
if (!isset($_SESSION['logemail'])){
    echo "<script>location.href='./loginorsignup.php';</script>";
}else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php echo"<script>location.href='./Users/myCourse.php';</script>"; ?>
</body>
</html>

<?php } ?>
<?php
$db_host = "localhost";
$db_user = "asha";
$db_password = "root.pw";
$db_name = "my_db";

//Create Connection
$conn = new mysqli ($db_host, $db_user, $db_password, $db_name);

//check Connection
if ($conn->connect_error){
    die ("Connectio failed");
}

?>
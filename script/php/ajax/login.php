<?php
session_start();

$successful = false;

if(isset($_POST['password']) && isset($_POST['username']) && $_POST['username'] != "" && $_POST['password'] == "password") {

    $_SESSION['login'] = true;
    $_SESSION['username'] = $_POST['username'];

    $successful = true;
}

echo json_encode(array('successful' => $successful));
?>
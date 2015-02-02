<?php
session_start();
require_once "../other/dbConnection.php";
require_once "../model/userModel.php";

$userData = new \model\userModel($db);

if($userData->checkLogin($_POST['username'], $_POST['password'])) {
    $user = $userData->getData($_POST['username']);
    $_SESSION['login'] = true;
    $_SESSION['userdata'] = $user;
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
?>
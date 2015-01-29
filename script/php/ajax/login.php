<?php
session_start();
require "../other/dbConnection.php";
require "../model/userModel.php";

$userData = new \model\userModel($db);

if($userData->checkLogin($_POST['user'], $_POST['password'])) {
    $user = $userData->getUserData($_POST['user']);
    $_SESSION['user_id'] = $user[0];
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
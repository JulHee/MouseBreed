<?php
session_start();
require_once "../other/dbConnection.php";
require_once "../model/userModel.php";
require_once "../model/breedModel.php";

$userData = new \model\userModel($db);
$breedData = new \model\breedModel($db);

if($userData->checkLogin($_POST['username'], $_POST['password'])) {

    $_SESSION['login'] = true;
    $_SESSION['userdata'] = $userData->getData($_POST['username']);
    $_SESSION['breeds'] = $breedData->getGeneralData($_SESSION['userdata']['id']);

    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
?>
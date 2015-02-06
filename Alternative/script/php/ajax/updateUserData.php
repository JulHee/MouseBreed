<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login']) {
    require_once "../other/dbConnection.php";
    require_once "../model/userModel.php";

    $userData = new \model\userModel($db);

    $kyes = json_decode($_POST['kyes']);
    $values = json_decode($_POST['values']);

    if($userData->update($_SESSION['userdata']['id'], $kyes, $values)) {
        for ($i = 0; $i < count($kyes); $i++) {
            $_SESSION['userdata'][$kyes[$i]] = $values[$i];
        }
        echo json_encode(array('success' => true));
    } else {
    }
} else {
}
?>
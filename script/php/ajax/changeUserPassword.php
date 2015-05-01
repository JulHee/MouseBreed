<?php
session_start();
require_once "../other/dbConnection.php";
require_once "../model/userModel.php";

$userData = new \model\userModel($db);

if ($userData->checkLogin($_SESSION['userdata']['username'], $_POST['oldPassword'])) {
    if ($userData->changePassword($_SESSION['userdata']['id'], $_POST['newPassword'])) {
        session_unset();
        session_destroy();
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'msg' => 'Passwort konnte nicht geändert werden.'));
    }
} else {
    echo json_encode(array('success' => false, 'msg' => 'Passwort falsch.'));
}
?>
<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login']) {
    require_once "../other/dbConnection.php";
    require_once "../model/userModel.php";

    $userData = new \model\userModel($db);

    $keys = json_decode($_POST['keys']);
    $values = json_decode($_POST['values']);

    if($userData->update($_SESSION['userdata']['id'], $keys, $values)) {
        for ($i = 0; $i < count($keys); $i++) {
            $_SESSION['userdata'][$keys[$i]] = $values[$i];
        }
        echo json_encode(array('success' => true));
    } else {
    }
} else {
}
?>
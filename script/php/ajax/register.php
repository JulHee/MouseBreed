<?php
require_once "../other/dbConnection.php";
require_once "../model/userModel.php";

$userData = new \model\userModel($db);

// check if all inputfields are filled
if($_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['username'] != "" && $_POST['email'] != "" && $_POST['password'] != "" && $_POST['password2'] != "") {

    // check if both passwords are equal
    if($_POST['password'] == $_POST['password2']) {

        // check if username exists
        if(!$userData->exists($_POST['username'])) {

            if($userData->add($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password'])) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false, 'msg' => 'Konto konnte nicht erstellt werden.'));
            }
        } else {
            echo json_encode(array('success' => false, 'msg' => 'Der eingegebene Benutzername ist leider schon vergeben.'));
        }
    } else {
        echo json_encode(array('success' => false, 'msg' => 'Passwörter stimmen nicht überein.'));
    }
} else {
    echo json_encode(array('success' => false, 'msg' => 'Bitte alle Felder ausfüllen!'));
}
?>
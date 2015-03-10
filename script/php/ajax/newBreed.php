<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login']) {
    require_once "../other/dbConnection.php";
    require_once "../model/breedModel.php";

    $breedModel = new \model\breedModel($db);

    $newBreed = $breedModel->newBreed($_SESSION['userdata']['id'], $_POST['targetId'], $_POST['name']);

    if($newBreed > 0) {

        $_SESSION['breeds'] = $breedModel->getGeneralData($_SESSION['userdata']['id']);

        echo json_encode(array('success' => true, 'id' => $newBreed));
    } else {
        echo json_encode(array('success' => false, 'msg' => 'Fehler'));
    }
} else {
}
?>
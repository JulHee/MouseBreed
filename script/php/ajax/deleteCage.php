<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['loadedBreed'])) {
    require_once "../other/dbConnection.php";
    require_once "../model/breedModel.php";

    $breedModel = new \model\breedModel($db);

    $res = $breedModel->deleteCage($_POST['id'],$_SESSION['loadedBreed']['id']);

    if($res) {
        $_SESSION['breeds'] = $breedModel->getGeneralData($_SESSION['userdata']['id']);
        //$_SESSION['loadedBreed'] = $breedModel->getData($_SESSION['loadedBreed']['id']);
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'msg' => 'Fehler'));
    }
} else {
}
?>
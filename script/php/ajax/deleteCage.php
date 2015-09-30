<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['loadedBreed'])) {
    require_once "../other/dbConnection.php";
    require_once "../model/breedModel.php";

    $breedModel = new \model\breedModel($db);

    $Id = $breedModel->deleteCage($_POST['id'],$_SESSION['loadedBreed']['id']);

    if($Id > 0) {
        echo json_encode(array('success' => true, 'id' => $Id));
    } else {
        echo json_encode(array('success' => false, 'msg' => 'Fehler'));
    }
} else {
}
?>
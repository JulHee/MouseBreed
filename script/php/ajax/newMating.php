<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['loadedBreed'])) {
    require_once "../other/dbConnection.php";
    require_once "../model/breedModel.php";

    $breedModel = new \model\breedModel($db);

    $newMatingId = $breedModel->newMating($_SESSION['loadedBreed']['id'], $_POST['mother_id'], $_POST['father_id']);

    if($newMatingId > 0) {
        echo json_encode(array('success' => true, 'id' => $newMatingId));
    } else {
        echo json_encode(array('success' => false, 'msg' => 'Fehler'));
    }
} else {
}
?>
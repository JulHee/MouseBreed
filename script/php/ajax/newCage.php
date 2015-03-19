<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['loadedBreed'])) {
    require_once "../other/dbConnection.php";
    require_once "../model/breedModel.php";

    $breedModel = new \model\breedModel($db);

    $newCageId = $breedModel->newCage($_POST['max_number_of_mice'], $_SESSION['loadedBreed']['id']);

    if($newCageId > 0) {
        echo json_encode(array('success' => true, 'id' => $newCageId));
    } else {
        echo json_encode(array('success' => false, 'msg' => 'Fehler'));
    }
} else {
}
?>
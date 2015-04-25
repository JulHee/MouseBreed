<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login']) {
    require_once "../other/dbConnection.php";
    require_once "../model/breedModel.php";

    $breedModel = new \model\breedModel($db);

    $newMouse = $breedModel->newMouse($_POST['cage_id'], $_SESSION['loadedBreed']['id'], $_SESSION['userdata']['id'], $_POST['gender'],
        $_POST['genotyp'], $_POST['weight'], $_POST['mother_id'], $_POST['father_id'], $_POST['age'],
        $_POST['img_name']);

    if($newMouse['id'] > 0) {
        echo json_encode(array('success' => true, 'id' => $newMouse['id'], 'name' => $newMouse['name']));
    } else {
        echo json_encode(array('success' => false, 'msg' => 'Fehler'));
    }
} else {
}
?>
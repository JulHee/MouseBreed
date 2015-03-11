<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login']) {
    require_once "../other/dbConnection.php";
    require_once "../model/breedModel.php";

    $breedModel = new \model\breedModel($db);

    $_SESSION['loadedBreed'] = $breedModel->getData($_POST['id']);
    $_SESSION['selectedCage'] = isset($matches[3]) ? $matches[3] : reset($_SESSION['loadedBreed']['cages'])['id'];

    echo json_encode(array('success' => true, 'loadedBreed' => $_SESSION['loadedBreed']));

} else {
    echo json_encode(array('success' => false, 'msg' => 'Fehler'));
}
?>
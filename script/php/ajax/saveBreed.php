<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login']) {
    require_once "../other/dbConnection.php";
    require_once "../model/breedModel.php";

    $breedModel = new \model\breedModel($db);

    $breed = json_decode($_POST['breed'], true);

    if($breedModel->saveBreed($breed)) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => true, 'msg' => 'Fehler'));
    }

} else {
    echo json_encode(array('success' => false, 'msg' => 'Nicht angemeldet'));
}
?>
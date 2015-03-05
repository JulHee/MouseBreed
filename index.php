<?php
session_start();
if (!isset($_GET['page']) || $_GET['page'] == "home") {
    $page = 'home_logged_' . (isset($_SESSION['login']) ? 'in' : 'out');
} elseif (preg_match("#breed/(\d+)#", $_GET['page'], $matches)) {
    require_once "script/php/other/dbConnection.php";
    require_once "script/php/model/breedModel.php";

    $breedData = new \model\breedModel($db);

    $page = 'breed';
    $loadedBreed = $breedData->getData($matches[1]);
} elseif (!file_exists('content/'.$_GET['page'].'.php')) {
    $page = "404";
} else {
    $page = $_GET['page'];
}

//TODO-Christoph: kommentieren

include_once('content/frame.php');
?>
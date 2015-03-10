<?php
session_start();
if(isset($_SESSION['login'])){
    require_once "script/php/other/dbConnection.php";
    require_once "script/php/model/breedModel.php";

    $breedData = new \model\breedModel($db);

    $myBreeds = $_SESSION['breeds'];
    $myBreedInfo = array();

    for($i=0; $i < count($myBreeds); $i++)
    {
        $myBreedInfo[] =  $breedData->getData($myBreeds[$i]['id']);
    }
    $_SESSION['myBreedInfo'] = $myBreedInfo;

}
if (!isset($_GET['page']) || $_GET['page'] == "home") {
    $page = 'home_logged_' . (isset($_SESSION['login']) ? 'in' : 'out');
} elseif (preg_match("#breed/(\d+)#", $_GET['page'], $matches)) {
    require_once "script/php/other/dbConnection.php";
    require_once "script/php/model/breedModel.php";

    $breedData = new \model\breedModel($db);

    $page = 'breed';
    $_SESSION['loadedBreed'] = $breedData->getData($matches[1]);
} elseif (!file_exists('content/'.$_GET['page'].'.php')) {
    $page = "404";
} else {
    $page = $_GET['page'];
}

//TODO-Christoph: kommentieren

include_once('content/frame.php');
?>
<?php
session_start();

//TODO-Christoph: kommentieren
if (!isset($_GET['page']) || $_GET['page'] == "home") {
    $page = 'home_logged_' . (isset($_SESSION['login']) ? 'in' : 'out');
} elseif (!file_exists('content/'.$_GET['page'].'.php')) {
    $page = "404";
} elseif (preg_match("#(settings)(?:/(.*))?#", $_GET['page'], $matches)) {
    $page = $matches[1];
    $subpage = isset($matches[2]) ? $matches[2] : "general";
} else {
    $page = $_GET['page'];
}

include_once('content/frame.php');
?>
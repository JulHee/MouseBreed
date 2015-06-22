<?php
session_start();

if (!isset($_GET['page']) || $_GET['page'] == "home") {
    $page = 'home_logged_' . (isset($_SESSION['login']) ? 'in' : 'out');
} elseif (!file_exists('content/'.$_GET['page'].'.php')) {
    $page = "404";
} else {
    $page = $_GET['page'];
}

include_once('content/frame.php');
?>
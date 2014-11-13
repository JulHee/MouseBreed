<?php
session_start();

$page = (isset($_GET['page']) && file_exists('content/'.$_GET['page'].'.php')) ? $_GET['page'] : 'home';

include_once('content/frame.php');
?>
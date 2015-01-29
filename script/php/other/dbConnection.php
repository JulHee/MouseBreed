<?php

$db = new mysqli("localhost", "root", "database", "praedictum");
$stmt = "SET NAMES 'utf8'";
$stmt = $db->prepare($stmt);
$stmt->execute();

?>
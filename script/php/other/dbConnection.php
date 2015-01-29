<?php

$db = new mysqli("localhost", "Mouse", "MouseBreed", "breed");
$stmt = "SET NAMES 'utf8'";
$stmt = $db->prepare($stmt);
$stmt->execute();

?>
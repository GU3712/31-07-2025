<?php
$host = "localhost";
$user = "root";
$pass = "senai.123";
$db = "biblioteca";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>
<?php
include "conexao.php";
$id = $_GET['id'];
$conn->query("DELETE FROM emprestimos WHERE id = $id");
header("Location: index.php");
?>
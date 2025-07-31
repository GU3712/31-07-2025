<?php
include "conexao.php";

$aluno_id = $_POST['aluno_id'];
$livro_id = $_POST['livro_id'];
$data_emprestimo = $_POST['data_emprestimo'];
$data_devolucao = $_POST['data_devolucao'];

$sql = "INSERT INTO emprestimos (aluno_id, livro_id, data_emprestimo, data_devolucao)
        VALUES ('$aluno_id', '$livro_id', '$data_emprestimo', '$data_devolucao')";

$conn->query($sql);
header("Location: index.php");
?>
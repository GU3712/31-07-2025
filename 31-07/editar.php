<?php
include "conexao.php";
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'];

    $sql = "UPDATE emprestimos SET 
            data_emprestimo = '$data_emprestimo',
            data_devolucao = '$data_devolucao'
            WHERE id = $id";
    $conn->query($sql);
    header("Location: index.php");
} else {
    $res = $conn->query("SELECT * FROM emprestimos WHERE id = $id");
    $row = $res->fetch_assoc();
}
?>

<form method="POST">
    <h2>Editar Empréstimo</h2>
    <label>Data do Empréstimo:</label>
    <input type="date" name="data_emprestimo" value="<?= $row['data_emprestimo'] ?>"><br>
    <label>Data de Devolução:</label>
    <input type="date" name="data_devolucao" value="<?= $row['data_devolucao'] ?>"><br>
    <input type="submit" value="Atualizar">
</form>
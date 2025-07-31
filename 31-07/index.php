<?php
include "conexao.php";
$sql = "SELECT e.id, a.nome, l.titulo, e.data_emprestimo, e.data_devolucao 
        FROM emprestimos e
        JOIN alunos a ON e.aluno_id = a.id
        JOIN livros l ON e.livro_id = l.id";
$res = $conn->query($sql);

$alunos = $conn->query("SELECT * FROM alunos");
$livros = $conn->query("SELECT * FROM livros");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Empréstimo</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Empréstimo de Livro</h1>
    <form action="salvar.php" method="POST">
        <label>Aluno:</label>
        <select name="aluno_id" required>
            <?php while ($a = $alunos->fetch_assoc()) {
                echo "<option value='{$a['id']}'>{$a['nome']}</option>";
            } ?>
        </select><br>

        <label>Livro:</label>
        <select name="livro_id" required>
            <?php while ($l = $livros->fetch_assoc()) {
                echo "<option value='{$l['id']}'>{$l['titulo']}</option>";
            } ?>
        </select><br>

        <label>Data do Empréstimo:</label>
        <input type="date" name="data_emprestimo" required><br>

        <label>Data de Devolução:</label>
        <input type="date" name="data_devolucao"><br>

        <input type="submit" value="Salvar Empréstimo" class="btn">
    </form>

    <hr>

    <h2>Lista de Empréstimos</h2>
    <table>
        <tr>
            <th>Aluno</th><th>Livro</th><th>Data Empréstimo</th><th>Data Devolução</th><th>Ações</th>
        </tr>
        <?php while ($row = $res->fetch_assoc()): ?>
        <tr>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['titulo'] ?></td>
            <td><?= $row['data_emprestimo'] ?></td>
            <td><?= $row['data_devolucao'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
                <a href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Confirmar exclusão?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
<?php

require_once 'config.php';

$lista = [];
$stmt = $pdo->query("SELECT * FROM vagas");

    if ($stmt->rowCount() > 0) {
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<style>
    table, th, td {
        border: 1px solid gray;
        padding: 2px;
    }
</style>
</head>
<body>

<p align="center"><a href="inserir.php">Cadastrar Nova Vaga</a></p>
<table align="center">
    <tr>
        <th>ID</th>
        <th>TITULO</th>
        <th>DESCRICAO</th>
        <th>ATIVO</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach ($lista as $row) : ?>
    <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['titulo']?></td>
        <td><?php echo $row['descricao']?></td>
        <td align="center"><?php echo $row['ativo']?></td>
        <td align="center">
            <a href="editar.php?id=<?php echo $row['id']?>"><img src="https://img.icons8.com/metro/18/000000/edit.png"/></a>
            <a href="excluir.php?id=<?php echo $row['id']?>"><img src="https://img.icons8.com/fluent-systems-regular/18/000000/trash.png"/></a>

        </td>
    </tr>
    <?php endforeach ?>
</table>
</body>
</html>
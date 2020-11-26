<?php

require_once 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if($id) {
    $stmt = $pdo->prepare("SELECT * FROM vagas WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}


?>


<div align="center">

    <h3>Atualizar Vaga</h3>

    <form method="post" action="edit_action.php">

        <input type="hidden" name="id" value=<?php echo $info['id']?>>
        <p>
            <label>Titulo:</label><br>
            <input type="text" name="titulo" value="<?php echo $info['titulo']?>">
        </p>
        <p>
            <label>Descrição:</label><br>
            <input type="text" name="descricao" value="<?php echo $info['descricao']?>">
        </p>
        <p>
            <label>Status:</label><br>
            <input type="radio" name="ativo" value="s" <?php echo ($info['ativo'] == "s") ? "checked" : null; ?>>Ativo
            <input type="radio" name="ativo" value="n" <?php echo ($info['ativo'] == "n") ? "checked" : null; ?>>Inativo
        </p>
        <p><button type="submit">Atualizar</button></p>
    </form>
</div>

<?php

require_once 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');
// $ativo = $conexao->query("SELECT ativo FROM vagas");

if($id){
    $sqlSelect = $conexao->prepare("SELECT * FROM vagas WHERE id = :id");
    $sqlSelect->bindValue(':id', $id);
    $sqlSelect->execute();

    if($sqlSelect->rowCount() > 0) {

        $info = $sqlSelect->fetch(PDO::FETCH_ASSOC);

    } else {
        header("Location = index.php");
    }
} else {
    header("Location = index.php");
}

include __DIR__ . "/includes/header.php";

?>

<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3">Cadastrar vaga</h2>

    <form method="post" action="editar_action.php">
        <input type="hidden" name="id" value=<?php echo $info['id']?>>

        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo" value="<?php echo $info['titulo']?>">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"><?php echo $info['descricao']?></textarea>
        </div>

        <div class="form-group">
            <label>Status</label>

            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" <?php echo ($info['ativo'] == "s") ? "checked" : null; ?>> Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="n" <?php echo ($info['ativo'] == "n") ? "checked" : null; ?>> Inativo
                    </label>
                </div>
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Atualizar</button>
        </div>
    </form>

</main>

<?php

include __DIR__ . "/includes/footer.php";
?>
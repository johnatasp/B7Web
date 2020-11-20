<?php

require_once 'config.php';
?>


<div align="center">

    <h3>Cadastro de Vagas</h3>

    <form method="post" action="add_action.php">
        <p>
            <label>Titulo:</label><br>
            <input type="text" name="titulo">
        </p>
        <p>
            <label>Descrição:</label><br>
            <input type="text" name="descricao">
        </p>
        <p>
            <label>Status:</label><br>
            <input type="radio" name="ativo" value="s" checked>Ativo
            <input type="radio" name="ativo" value="n">Inativo
        </p>
        <p><button type="submit">Cadastrar</button></p>
    </form>
</div>

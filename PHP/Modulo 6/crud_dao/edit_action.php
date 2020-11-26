<?php

require_once 'config.php';

$id = filter_input(INPUT_POST, 'id');
$titulo = filter_input(INPUT_POST, 'titulo');
$descricao = filter_input(INPUT_POST, 'descricao');
$ativo = filter_input(INPUT_POST, 'ativo');

if($id && $titulo && $descricao && $ativo) {
    $stmt = $pdo->prepare("UPDATE vagas SET titulo = :titulo, descricao = :descricao, ativo = :ativo WHERE id = :id");
    $stmt->bindValue(':titulo', $titulo);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':ativo', $ativo);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header("Location: index.php");
    exit();

} else {
    header("Location: editar.php");
    exit();
}


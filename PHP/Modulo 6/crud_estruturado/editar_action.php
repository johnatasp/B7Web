<?php

require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$titulo = filter_input(INPUT_POST, 'titulo');
$descricao = filter_input(INPUT_POST, 'descricao');
$ativo = filter_input(INPUT_POST, 'ativo');
//$data = filter_input(INPUT_POST, 'data');
//$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL;


if ($titulo && $descricao && $ativo) {

    $sqlUpdate = "UPDATE vagas SET titulo = :titulo, descricao = :descricao, ativo = :ativo WHERE id = :id";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bindValue(':titulo', $titulo);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':ativo', $ativo);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header("Location: index.php");
    exit();

} else {
    header("Location: index.php");
    exit();
}
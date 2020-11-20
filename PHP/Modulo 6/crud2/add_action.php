<?php

require_once 'config.php';

$titulo = filter_input(INPUT_POST, 'titulo');
$descricao = filter_input(INPUT_POST, 'descricao');
$ativo = filter_input(INPUT_POST, 'ativo');

if(!isset($titulo, $descricao, $status)) {
    $sqlInsert = "INSERT INTO vagas (titulo, descricao, ativo) VALUES (:titulo, :descricao, :ativo)";
    $stmt = $pdo->prepare($sqlInsert);
    $stmt->bindValue(':titulo', $titulo);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':ativo', $ativo);
    $stmt->execute();

    header("Location: index.php");

} else {
    header("Location: inserir.php");
}
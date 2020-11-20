<?php

require 'config.php';

$titulo = filter_input(INPUT_POST, 'titulo');
$descricao = filter_input(INPUT_POST, 'descricao');
$ativo = filter_input(INPUT_POST, 'ativo');
//$data = filter_input(INPUT_POST, 'data');
//$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL;


if($titulo && $descricao && $ativo) {

    $sqlSelect = "SELECT * FROM vagas WHERE titulo = :titulo";
    $stmt = $conexao->prepare($sqlSelect);
    $stmt->bindValue(':titulo', $titulo);
    $stmt->execute();

    if($stmt->rowCount() === 0) {

        $sqlInsert = "INSERT INTO vagas (titulo, descricao, ativo) VALUES (:titulo, :descricao, :ativo)";
        $stmt = $conexao->prepare($sqlInsert);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':ativo', $ativo);
        $stmt->execute();
    
        header("Location: index.php");
        exit();

    } else {
        header("Location: cadastrar.php");
        exit();
    }

} else {
    header("Location: cadastrar.php");
    exit();
}
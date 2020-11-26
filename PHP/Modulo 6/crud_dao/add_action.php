<?php

require_once 'config.php';
require_once 'dao/VagaDaoMysql.php';

$vagaDao = new VagaDaoMysql($pdo);

$titulo = filter_input(INPUT_POST, 'titulo');
$descricao = filter_input(INPUT_POST, 'descricao');
$ativo = filter_input(INPUT_POST, 'ativo');

if(!empty($titulo && $descricao && status)) {

    if ($vagaDao->findByTitulo($titulo) === false) {
        $novaVaga = new Vaga();
        $novaVaga->setTitulo($titulo);
        $novaVaga->setDescricao($descricao);
        $novaVaga->setAtivo($ativo);

        $vagaDao->add($novaVaga);

        header("Location: index.php");
        exit();
    } else {
        header("Location: inserir.php");
        exit();
    }
} else {
    header("Location: inserir.php");
    exit();
}
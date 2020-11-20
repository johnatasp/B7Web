<?php

require_once 'config.php';

$lista = [];
$sqlSelect = $conexao->query("SELECT * FROM vagas");

if($sqlSelect->rowCount() > 0) {
    $lista = $sqlSelect->fetchAll(PDO::FETCH_ASSOC);
}

include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/listagem.php";
include __DIR__ . "/includes/footer.php";
